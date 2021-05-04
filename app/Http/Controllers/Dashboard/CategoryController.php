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

class CategoryController extends Controller
{
    public function createNew($object){
        $category = new Categorys();

        $category->name = $object['name'];
        $category->slug = Str::slug($object['name']);

        return $category->save();
    }
    public function getCategorys(Request $req){
        $category = Categorys::where('id',$req->id)->first();
        return response($category);
    }
    public function addCategorys(Request $req){
        $rule = array(
            'name'=>'bail|required',
        );
        $response = array(
            'name.required'=>'Cần nhập tên danh mục',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $this->createNew([
                'name' => $req->name,
            ]);
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Tạo danh mục thành công']);
        }

        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Thông tin nhập chưa đúng', 'errors' => $validator->errors()]);
    }
    public function editCategorys(Request $req){
        $rule = array(
            'name'=>'bail|required',
        );
        $response = array(
            'name.required'=>'Cần nhập tên danh mục',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $category = Categorys::where('id',$req->id)->first();
			$category->name = $req->name;
            $category->save();

            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Cập nhật danh mục thành công']);
        }

        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Thông tin nhập chưa đúng', 'errors' => $validator->errors()]);
    }
    public function deleteCategorys(Request $req){
        $rule = array(
            'id' => 'bail|required',
        );
        $response = array(
            'id.required'=>'Lỗi không tìm thấy danh mục',
        );
        $validator = Validator::make($req->all(),$rule,$response);

        if($validator->passes()){
            News::where('category',$req->id)->delete();
            ChillCategorys::where('categoryId',$req->id)->delete();
            Categorys::where('id',$req->id)->delete();
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Xóa danh mục thành công']);
        }
        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Xóa thất bạt', 'errors' => $validator->errors()]);
    }
}
