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


class AccountController extends Controller
{
    public function pin(Request $req){
        if($req->action = 'pin'){

            //lấy người dùng đã đăng nhập
            $user = User::where('id',$req->user_id)->first();

            $pinned_news = explode('|',$user->pinned_news);

            $pinned_news[count($pinned_news)] = $req->post_id;

            $user->pinned_news = implode('|',$pinned_news);

            $user->save();
        }
        return response(['status'=>1,'message'=>'lưu bài viết thành công']);
    }
    public function unpin(Request $req){
        if($req->action = 'unpin'){

            //lấy người dùng đã đăng nhập
            $user = User::where('id',$req->user_id)->first();

            $new_ids = explode('|',$user->pinned_news);

            foreach($new_ids as $key => $new_id){

                if(trim($new_id) == $req->post_id){

                    unset($new_ids[$key]);
                }
            }
            $user->pinned_news = implode('|',$new_ids);

            $user->save();
        }
        return response(['status'=>1,'message'=>'Bỏ lưu bài viết thành công']);
    }
    public function accountDetail(Request $req){
        $user = User::where('id', Auth::id())->first();
        $pinned_news_ID = explode('|',$user->pinned_news);

        foreach($pinned_news_ID as $key=>$value){
            if(trim($value) == '' || !$value)
                unset($pinned_news_ID[$key]);
        }

        $pinned_news = News::whereIn('id',$pinned_news_ID)->get();
        
        $data = [
            'pinned_news' => $pinned_news,
        ];
        return view("client.account.detail",$data);
    }
    public function accountUpdate(Request $req){
        if(!Auth::check())
            return redirect()->route('client.login');
        $rule = array(
            'email' => 'bail|required|email|',
            'password' => 'bail|required|min:8|max:50',
            'name' => 'bail|required|min:1|max:30',
            'address' => 'bail|min:1|max:100',
            'phone_number' => 'bail|min:1|max:30',
        );
        $response = array(
            'email.required' => 'Mời bạn nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mời bạn nhập mật khẩu',
            'password.min' => 'Mật khẩu cần ít nhất 8 kí tự',
            'password.max' => 'Mật khẩu tối đa 50 kí tự',
            'name.required' => 'Mời bạn nhập tên',
            'name.min' => 'Tên cần ít nhất 8 kí tự',
            'name.max' => 'Tên tối đa 50 kí tự',
            'address.min' => 'Địa chỉ quá ngắn, đó có phải là địa chỉ ko?',
            'address.max' => 'Địa chỉ quá dài, bạn sống ở sao Hỏa à',
            'phone_number.min' => 'Số điện thoại quá ngắn, đó có phải là thể tích não của bạn?',
            'phone_number.max' => 'Số điện thoại quá dài',
        );
        $validator = Validator::make($req->all(),$rule,$response);
        if($validator->passes()){
            $user = User::where('id',Auth::user()->id)->first();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->address = $req->address;
            $user->phone_number = $req->phone_number;
            $user->password = Hash::make($req->password);
            if($user->save())
                return response(['status'=>1,'message'=>'Cập nhật thành công']);
            return response(['status'=>0,'message'=>'Lỗi không xác định, cập nhật thất bại']);
        }
        return response(['status'=>0,'isValidateError'=>1,'message'=>'Cập nhật thất bại','errors'=>$validator->errors()]);
    }
}
