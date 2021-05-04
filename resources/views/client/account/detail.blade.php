@extends('client.templates.master')
@section('content')
<style>
.input-form {
    text-align: center;
    position: relative;
}
.media-left > img{
    object-fit: cover;
    height: 120px;
    width: 200px;
}
.input-form input, .input-form button {
    width: 100%;
    border: 0;
    border-radius: 20px;
}

.input-form input{
    border-bottom: 2px solid #444;
    padding: 12px 40px 12px 20px;
}
.group{
    margin-bottom: 10px;
    position: relative;
}

.group i{
    position: absolute;
    top: 15px;
    right: 20px;
}
button {
    padding: 12px;
    background-image: linear-gradient(to right, #ff1464, purple);
    margin-bottom: 20px;
    cursor: pointer;
}
button, button i{
    color: #ffffff;
}

button i{
    margin-right: 5px;
}

p{
    margin-bottom: 20px;
}

i.fa.fa-empire, .spost_nav.bigger a{
    font-size: 18px;
}

i.fa.fa-empire{
    font-size: 60px;
    margin-bottom: 20px;
}

h2{
    margin-bottom: 20px;
}

input:focus, input:focus::placeholder, input:focus+i{
    color: #ff1464;
}

input:focus, button:focus{
    outline: 0;
}
.hidden{
	display: none;
}
</style>
<section id="contentSection">
	<div style="min-height: 500px;" class="">
		<div class="row">
	      	<div class="col-lg-2 col-md-2 col-sm-2">
	      		<div class="menu-button @if(Request()->section == "detail") active @endif" item-target = 1>
	      			Thông tin
	      		</div>
	      		<div class="menu-button @if(Request()->section == "pinnednews") active @endif" item-target = 2>
	      			Tin yêu thích
	      		</div>
	      	</div>
	      	<div class="col-lg-10 col-md-10 col-sm-10">
	      		<div class="menu-item @if(Request()->section != "detail") hidden @endif" data-index = 1 style="background-color: whitesmoke;padding: 20px 30px;height: 100vh;">
	      			<div class="input-form">
	      				<form method="post" action="" id="update_account_information_form">
						    <div class="row">
						    	<div class="col-lg-12 col-md-12 col-sm-12">
						    		<div class="avatar"></div>
						    	</div>
						    	<div class="col-lg-6 col-md-6 col-sm-6">
						    		<label for="">Tên tài khoản</label>
						    		<div class="group">
						    			<input name="name" data-name="name" type="text" placeholder="Tên tài khoản" value="@if(Auth::user()->name) {{ Auth::user()->name }} @endif">
						    			<i class="fa fa-user"></i>
						    		</div>
						    	</div>
						    	<div class="col-lg-6 col-md-6 col-sm-6">
						    		<label for="">Email</label>
						    		<div class="group">
						    			<input name="email" data-name="email" type="text" placeholder="Email" value="@if(Auth::user()->email) {{ Auth::user()->email }} @endif">
						    			<i class="fas fa-envelope"></i>
						    		</div>
						    	</div>
						    	<div class="col-lg-6 col-md-6 col-sm-6">
						    		<label for="">Số điện thoại</label>
						    		<div class="group">
						    			<input name="phone_number" data-name="phonenumber" type="text" placeholder="Số điện thoại" value="@if(Auth::user()->phone_number) {{ Auth::user()->phone_number }} @endif">
						    			<i class="fas fa-phone"></i>
						    		</div>
						    	</div>
						    	<div class="col-lg-6 col-md-6 col-sm-6">
						    		<label for="">Địa chỉ</label>
						    		<div class="group">
						    			<input name="address" data-name="address" type="text" placeholder="Địa chỉ" value="@if(Auth::user()->address) {{ Auth::user()->address }} @endif">
						    			<i class="fas fa-address-book"></i>
						    		</div>
						    	</div>
						    	<div class="col-lg-6 col-md-6 col-sm-6">
						    		<label for="">Mật khẩu</label>
						    		<div class="group">
						    			<input name="password" data-name="password" type="password" placeholder="Mật khẩu">
						    			<i class="fa fa-lock"></i>
						    		</div>
						    	</div>
						    </div>
					    </form>
					    <button id="update_account_information_btn" target_form = "update_account_information_form"> <i class="fa fa-send"></i>Cập nhật</button>
					</div>
				</div>
				<div class="menu-item @if(Request()->section != "pinnednews") hidden @endif" data-index = 2 style="padding: 20px 30px;">
	      			<ul class="spost_nav bigger">
		                @foreach($pinned_news as $new)
		                  <li>
		                    <div class="media nowow"> 
		                    	<a href="{{ route('index.post',['category'=>$new->getCategory->slug,'chill_category'=>$new->getChillCategory->slug,'slug'=>$new->slug]) }}" class="media-left"> 
		                    		<img alt="" src="{{ $new->image}}" data-src="{{ $new->image}}"> 
		                    	</a>
		                      <div class="media-body"> 
		                      	<a href="{{ route('index.post',['category'=>$new->getCategory->slug,'chill_category'=>$new->getChillCategory->slug,'slug'=>$new->slug]) }}" class="catg_title">
		                      		{{ $new->title }}
		                      	</a> 
		                      </div>
		                    </div>
		                  </li>
		                @endforeach
	              	</ul>
				</div>
	      	</div>
	    </div>
    </div>
</section>
<script type="text/javascript">
	
</script>
@endsection