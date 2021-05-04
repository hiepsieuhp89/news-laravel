<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\File; 
use GuzzleHttp\Client as GuzzleClient;
use Validator;
use Illuminate\Support\Str;
use Auth;

use App\Models\News;
use App\Models\User;
use App\Models\Categorys;
use App\Models\ChillCategorys;
use App\Models\Authors;
use App\Models\sources;
use App\Models\staffs;

class adminController extends Controller
{
    public function getDTB(Request $req){
        $id = $req->category_id;
        $data = ChillCategorys::select('id','name')->where('categoryId',$id)->get();
        return response($data);
    }
    public function index(){
    	return view('admin.index');
    }
    public function login(){
        return view('admin.login');
    }
    public function postLogin(Request $req){
        $rule = array(
            'email' => 'bail|required|email|',
            'password' => 'bail|required'
        );
        $response = array(
            'email.required' => 'Mời bạn nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mời bạn nhập mật khẩu',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            if(Auth::guard('staff')->attempt(array('email' => $req->email ,'password' => $req->password)))
                return response(['status'=>1,'message'=>'Đăng nhập thành công','url' => route('admin.home')]);
            return response(['status'=>0,'message'=>'Sai mật khẩu hoặc tài khoản không có trong hệ thống']);
        }
        return response(['status'=>0,'isValidateError'=>1,'message'=>'Đăng nhập thất bại','errors'=>$validator->errors()]);
    }
    public function overview(){
    	return view('admin.table.index');
    }
    public function getDatabase(){
    	$news = News::all();
    	$user = User::all();
    	$chillCategorys = ChillCategorys::all();
        $categorys = Categorys::all();
    	$authors = Authors::all();
        $sources = sources::all();

    	$data = [
    		'news' => $news,
    		'categorys' => $categorys,
    		'chillCategorys' => $chillCategorys,
            'authors' => $authors,
            'users' => $user,
            'sources' => $sources,
    	];
    	return view('admin.csdl.all',$data);
    }
    public function getSeed(){
        $news = News::all();
        $categorys = Categorys::all();
        $chill_categorys = ChillCategorys::all();
        $authors = Authors::all();
        $sources = sources::all();
        return view('seed',["news"=>$news,"categorys"=>$categorys,"chill_categorys"=>$chill_categorys,"authors"=>$authors,"sources"=>$sources]);
    }
}
