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

class ChillCategoryController extends Controller
{
    public function createNew($object){
        $chill_category = new ChillCategorys();

        $chill_category->name = $object['name'];
        $chill_category->categoryId = $object['categoryId'];
        $chill_category->slug = Str::slug($object['name']);

        return $chill_category->save();
    }
    public function getChillCategorys(Request $req){
        $chill_category = ChillCategorys::where('id',$req->id)->first();
        return response($chill_category);
    }
    public function addChillCategorys(Request $req){
        $rule = array(
            'name'=>'bail|required',
            'categoryId'=>'bail|required',
        );  
        $response = array(
            'name.required'=>'Cần nhập tên danh mục',
            'categoryId.required'=>'Cần nhập chọn danh mục cha',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $this->createNew([
                'name' => $req->name,
                'categoryId' => $req->categoryId,
            ]);
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Tạo danh mục con thành công']);
        }

        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Thông tin nhập chưa đúng', 'errors' => $validator->errors()]);
    }
    public function editChillCategorys(Request $req){
        $rule = array(
            'name'=>'bail|required',
            'categoryId'=>'bail|required',
        );
        $response = array(
            'name.required'=>'Cần nhập tên danh mục',
            'categoryId.required'=>'Cần nhập chọn danh mục cha',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $chill_category = ChillCategorys::where('id',$req->id)->first();
			$chill_category->name = $req->name;
			$chill_category->categoryId = $req->categoryId;
            $chill_category->save();

            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Cập nhật danh mục con thành công']);
        }

        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Thông tin nhập chưa đúng', 'errors' => $validator->errors()]);
    }
    public function deleteChillCategorys(Request $req){
        $rule = array(
            'id' => 'bail|required',
        );
        $response = array(
            'id.required'=>'Lỗi không tìm thấy danh mục con',
        );
        $validator = Validator::make($req->all(),$rule,$response);

        if($validator->passes()){
            News::where('chill_category',$req->id)->delete();
            ChillCategorys::where('id',$req->id)->delete();
            return response(['form_id'=>$req->form_id,'status' => 1,'message' => 'Xóa danh mục con thành công']);
        }
        return response(['form_id'=>$req->form_id,'status' => 0, 'message' => 'Xóa thất bạt', 'errors' => $validator->errors()]);
    }
}
