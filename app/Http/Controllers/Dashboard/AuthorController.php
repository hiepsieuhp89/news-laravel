<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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

class AuthorController extends Controller
{
    public function createNew($object){
        $author = new Authors();

        $author->name = $object['name'];
        $author->url = $object['url'];

        return $author->save();
    }
    public function getAuthors(Request $req){
        $author = Authors::where('id',$req->id)->first();
        return response($author);
    }
    public function addAuthors(Request $req){
        $rule = array(
            'name'=>'bail|required',
        );
        $response = array(
            'name.required'=>'Cần nhập tên tác giả',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $this->createNew([
                'name' => $req->name,
                'url' => $req->url,
            ]);
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Thêm tác giả thành công']);
        }

        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Thông tin nhập chưa đúng', 'errors' => $validator->errors()]);
    }
    public function editAuthors(Request $req){
        $rule = array(
            'name'=>'bail|required',
        );
        $response = array(
            'name.required'=>'Cần nhập tên tác giả',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $author = Authors::where('id',$req->id)->first();
			$author->name = $req->name;
			$author->url = $req->url;
            $author->save();

            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Cập nhật tác giả thành công']);
        }

        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Thông tin nhập chưa đúng', 'errors' => $validator->errors()]);
    }
    public function deleteAuthors(Request $req){
        $rule = array(
            'id' => 'bail|required',
        );
        $response = array(
            'id.required'=>'Lỗi không tìm thấy tác giả',
        );
        $validator = Validator::make($req->all(),$rule,$response);

        if($validator->passes()){
            News::where('author',$req->id)->delete();
            Authors::where('id',$req->id)->delete();
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Xóa tác giả thành công']);
        }
        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Xóa thất bại', 'errors' => $validator->errors()]);
    }
}
