<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\File; 
use GuzzleHttp\Client as GuzzleClient;
use Validator;
use Illuminate\Support\Str;

use App\Models\News;
use App\Models\User;
use App\Models\Categorys;
use App\Models\ChillCategorys;
use App\Models\Authors;
use App\Models\sources;

class NewsController extends Controller
{
    public function createNew($object){
        $new = new News();

        $new->title = $object['title'];
        $new->first_look = $object['first_look'];
        $new->chill_category = $object['chill_category'];
        $new->category = $object['category'];
        $new->author = $object['author'];
        $new->source = $object['source'];
        $new->image = $object['image'];
        $new->slug = Str::slug($object['title']);
        $new->hot = 0;
        $new->description = $object['description'];

        return $new->save();
    }
    public function getNews(Request $req){
        $new = News::where('id',$req->id)->first();
        return response($new);
    }
    public function addNews(Request $req){
        $rule = array(
            'title'=>'bail|required',
            'category'=>'bail|required',
            'chill_category'=>'bail|required',
            'author'=>'bail|required',
            'first_look'=>'bail|required',
            'source'=>'bail|required',
            'image'=>[
                'required',
                function ($attribute, $value, $fail) {
                    if (!isset($value) || trim($value) == '') {
                        $fail('Cần chọn ảnh đại diện');
                    }
                },
            ],
            'description'=>'bail|required',
        );
        $response = array(
            'title.required'=>'Cần nhập tiêu đề',
            'first_look.required'=>'Cần nhập tóm tắt nội dung',
            'category.required'=>'Cần nhập danh mục cha',
            'chill_category.required'=>'Cần nhập danh mục con',
            'author.required'=>'Cần chọn tác giả',
            'source.required'=>'Cần chọn nguồn',
            'image.required'=>'Cần chọn ảnh đại diện',
            'description.required'=>'Cần nhập nội dung bài viết',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $image = $this->ImgurService($req->image);
            $this->createNew([
                'title' => $req->title,
                'first_look' => $req->first_look,
                'category' => $req->category,
                'chill_category' => $req->chill_category,
                'author' => $req->author,
                'source' => $req->source,
                'image' => $image,
                'description' => $req->description,
            ]);
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Tạo bài viết thành công']);
        }

        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Thông tin nhập chưa đúng', 'errors' => $validator->errors()]);
    }
    public function editNews(Request $req){
        $rule = array(
            'id' => 'bail|required',
            'title'=>'bail|required',
            'category'=>'bail|required',
            'chill_category'=>'bail|required',
            'author'=>'bail|required',
            'first_look'=>'bail|required',
            'source'=>'bail|required',
            'description'=>'bail|required',
        );
        $response = array(
            'id.required'=>'Lỗi không tìm thấy sản phẩm',
            'title.required'=>'Cần nhập tiêu đề',
            'first_look.required'=>'Cần nhập tóm tắt nội dung',
            'category.required'=>'Cần nhập danh mục cha',
            'chill_category.required'=>'Cần nhập danh mục con',
            'author.required'=>'Cần chọn tác giả',
            'source.required'=>'Cần chọn nguồn',
            'description.required'=>'Cần nhập nội dung bài viết',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $new = News::where('id',$req->id)->first();
            if($req->image){
                $image = $this->ImgurService($req->image);
                $new->title = $req->title;
                $new->first_look = $req->first_look;
                $new->chill_category = $req->chill_category;
                $new->category = $req->category;
                $new->author = $req->author;
                $new->source = $req->source;
                $new->image = $image;
                $new->description = $req->description;
                $new->slug = Str::slug($req->title);
                $new->save();
            }
            else{
                $new->title = $req->title;
                $new->first_look = $req->first_look;
                $new->chill_category = $req->chill_category;
                $new->category = $req->category;
                $new->author = $req->author;
                $new->source = $req->source;
                $new->description = $req->description;
                $new->slug = Str::slug($req->title);
                $new->save();
            }
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Cập nhật bài viết thành công']);
        }

        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Thông tin nhập chưa đúng', 'errors' => $validator->errors()]);
    }
    public function deleteNews(Request $req){
        $rule = array(
            'id' => 'bail|required',
        );
        $response = array(
            'id.required'=>'Lỗi không tìm thấy sản phẩm',
        );
        $validator = Validator::make($req->all(),$rule,$response);

        if($validator->passes()){
            News::where('id',$req->id)->delete();
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Xóa bài viết thành công']);
        }
        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Xóa thất bạt', 'errors' => $validator->errors()]);
    }
    public function ImgurService($imagePath){
        $client = new GuzzleClient();
        $request = $client->request(
            'POST',
            'https://api.imgur.com/3/image',
            [
                'headers' => [
                    'Authorization' => "Client-ID 12c295e733a1867", // post as anonymous
                ],
                'form_params' => [
                    'image' => file_get_contents($imagePath)
                ]
            ]
        );
        $response = (string) $request->getBody();
        $jsonResponse = json_decode($response);
        return $jsonResponse->data->link; // return url of image
    }
}
