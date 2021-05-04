<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Models\User;
use App\Models\Categorys;
use App\Models\ChillCategorys;
use App\Models\News;

class IndexController extends Controller
{
    public function login(Request $req){
        if(Auth::check())
            return redirect()->route('home');
        return view("client.login");
    }
    public function logout(Request $req){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }
    public function postLogin(Request $req)
    {
        if($req->ajax()){
            $rule = array(
                'email' => 'required|email|',
                'password' => 'bail|required|min:8|max:50',
            );
            $response = array(
                'email.required' => 'Mời bạn nhập email',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mời bạn nhập mật khẩu',
                'password.min' => 'Mật khẩu cần ít nhất 8 kí tự',
                'password.max' => 'Mật khẩu tối đa 50 kí tự',
            );
            $validator = Validator::make($req->all(),$rule,$response);
            if($validator->passes()){
                    if(Auth::attempt(array('email' => $req->email ,'password' => $req->password)))
                        return response(['status'=>1,'message'=>'Đăng nhập thành công','url'=>route('home')]);
                    return response(['status'=>0,'message'=>'Sai mật khẩu hoặc tài khoản không có trong hệ thống']);          
            }
            return response(['status'=>0,'isValidateError'=>1,'message'=>'Đăng nhập thất bại','errors'=>$validator->errors()]);
        }    
    }
    public function postRegister(Request $req)
    {
        //giá trị gửi đến bằng ajax
        if($req->ajax()){
            //luật validate
            $rule = array(
                'email' => 'bail|required|email|unique:users',
                'password' => 'bail|required|min:8|max:50',
            );
            //phản hồi khi validate thất bại
            $response = array(
                'email.required' => 'Mời bạn nhập email',
                'email.email' => 'email không đúng định dạng',
                'email.unique' => 'Email đã được sử dụng, hãy nhập email khác',
                'password.required' => 'Mời bạn nhập mật khẩu',
                'password.min' => 'Mật khẩu cần ít nhất 8 kí tự',
                'password.max' => 'Mật khẩu tối đa 50 kí tự',
            );

            //kiểm tra giá trị người dùng đã nhập
            $validator = Validator::make($req->all(),$rule,$response);

            //nếu kiểm tra thành thông mà không lỗi
            if($validator->passes()){

                //tạo một người dùng
                $User = User::create([
                    'name' => $req->username,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'pinned_news' => '',
                    'phone_number' => '',
                    'address' => '',
                ]);

                //đăng nhập luôn sau khi tạo
                Auth::login($User);
                \Session::flash('toastr', ['type' => 'success','message' => 'Đăng ký thành công']);
                \Session::flash('toastr', ['type' => 'success','message' => 'Đang đăng nhập']);

                //đăng ký thành thông, direct đến trang chủ
                return response(['status'=>1,'isValidateError'=>0,'message'=>'Đăng ký thành công','url'=>route('home')]);
            }
            else{
                $error = $validator->errors();
                $output = ['email' => $error->first('email'),'password' => $error->first('password')];

                return response(['status'=>0,'isValidateError'=>1,'message'=>'Đăng ký thất bại','errors'=>$output]);
            }
        }    
    }
}
