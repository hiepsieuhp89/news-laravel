<html lang="en">
<head>
    <base href="{{ asset('') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="alertifyjs/css/alertify.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css"
      rel="stylesheet"
    />
    <style>
    	* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: #444;
    font-family: calibri;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100vw;
    background: azure;
    overflow: visible;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
}

.input-form {
    text-align: center;
    position: relative;
    width: 350px;
    border-radius: 10px;
    background: whitesmoke;
    padding: 20px 30px;
    box-shadow: 0px 0px 10px 0px #545454;
}
.ajs-dialog .ajs-body .ajs-content{
            font-weight: 600;
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


.input-form input, .input-form button, .group i, p, a{
    font-size: 13.3333px;
    font-weight: 600;
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
    background-image: linear-gradient(to right, #ff1464, #a70e1a);
    margin-bottom: 20px;
    cursor: pointer;
}

button, button i{
    color: #ffffff;
}

.input-form button i{
    margin-right: 5px;
}

p{
    margin-bottom: 20px;
}

i.fa.fa-empire, a{
    color: #ff1464;
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


body:before, body:after{
    content: "";
    position: absolute;
    height: 300px;
    width: 500px;
}

body:before{
    background-image: linear-gradient(to right, #ff1464, #a70e1a);
    bottom: 0;
    left: 0;
    clip-path: polygon(0 0, 0 100%, 100% 100%);
}

body:after{
    background-image: linear-gradient(to right, #a70e1a, #ff1464);
    top: 0;
    right: 0;
    clip-path: polygon(100% 0, 0 0, 100% 100%);
}
.hidden{
	display: none;
}
@media (max-width: 767px){
    body:before, body:after{
        height: 150px;
        width: 300px;
    }
}
    </style>
</head>
<body>
    <div class="login input-form animated fadeInDown">
        <i class="fa fa-empire"></i>
        <h2>Đăng nhập</h2>
        <div class="group"><input data-name="email_input" type="text" placeholder="Email đăng nhập"><i class="fas fa-envelope"></i></div>
        <div class="group"><input data-name="password_input" type="password" placeholder="Mật khẩu"><i class="fa fa-lock"></i></div>
        <button id="login_btn"> <i class="fa fa-send"></i>Đăng nhập</button>
        <p class="fs">Hoặc đăng nhập bằng <a style="font-size: 1.5em;" href="{{ route('socialite.facebook.login') }}"><i style="color: #4267B2;" class="fab fa-facebook"></i></a><a style="font-size: 1.5em; margin-left: 10px;" href="{{ route('socialite.google.login') }}"><i style="color: #DB4437;" class="fab fa-google"></i></a></p>
        <p class="ss">Chưa có tài khoản? <a class="toggle-btn" form-active="register" href="javascript:void(0);">Đăng ký</a></p>
    </div>
    <div class="register hidden input-form animated fadeInDown">
        <i class="fa fa-empire"></i>
        <h2>Đăng ký</h2>
        <div class="group"><input data-name="username_input" type="text" placeholder="Tên tài khoản"><i class="fa fa-user"></i></div>
        <div class="group"><input data-name="email_input" type="text" placeholder="Email đăng ký"><i class="fas fa-envelope"></i></div>
        <div class="group"><input data-name="password_input" type="password" placeholder="Mật khẩu"><i class="fa fa-lock"></i></div>
        <button id="register_btn"> <i class="fa fa-send"></i>Đăng ký</button>
        <p class="fs">Hoặc đăng ký bằng <a style="font-size: 1.5em;" href="{{ route('socialite.facebook.login') }}"><i style="color: #4267B2;" class="fab fa-facebook"></i></a><a style="font-size: 1.5em; margin-left: 10px;" href="{{ route('socialite.google.login') }}"><i style="color: #DB4437;" class="fab fa-google"></i></a></p>
        <p class="ss">Đã có tài khoản? <a class="toggle-btn" form-active="login" href="javascript:void(0);">Đăng nhập</a></p>
    </div>
    <script src="assets/js/jquery.min.js"></script> 
	<script src="assets/js/wow.min.js"></script> 
	<script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/slick.min.js"></script> 
	<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
	<script src="assets/js/jquery.newsTicker.min.js"></script> 
	<script src="assets/js/jquery.fancybox.pack.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script src="alertifyjs/alertify.min.js"></script>
	<script src="https://kit.fontawesome.com/12065bbb1f.js" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"
    ></script>

	<script>
		function goto(url){
			window.location.href = url;
		}
	</script>
    <script>
        $(".animated").addClass("delay-1s")
    	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        
    	$('.toggle-btn').on('click',function(){
    		$('.input-form').hide();

    		$('.' + $(this).attr('form-active')).show();
    	})
    	$('#login_btn').on('click',function(){
    		$.ajax({
                    type: 'post',
                    url: '{{ route('client.postLogin') }}',
                    data: {
                        'email': $('.login input[data-name="email_input"]').val(),
                        'password' : $('.login input[data-name="password_input"]').val(),
                        'type' : 'login',
                    },
                    success:function(data){
                    	if(data.status){
                            alertify.success(data.message);
                            goto(data.url);
                        } 
                    	else{
                            if(data.isValidateError){
                                let message_string = "";
                                $.each(data.errors,function(name,message){
                                    message_string += message + '<br>'; 
                                })
                                alertify
                                .alert("Thông báo",message_string, function(){
                                });
                            }   
                            else{
                                alertify
                                .alert("Thông báo",data.message, function(){
                                });
                            }
                    	}
                    }
                });
    	})
    	$('#register_btn').on('click',function(){
    		$.ajax({
                    type: 'post',
                    url: '{{ route('client.postRegister') }}',
                    dataType: "json",
                    data: {
                        'username' : $('.register input[data-name="username_input"]').val(),
                        'email': $('.register input[data-name="email_input"]').val(),
                        'password' : $('.register input[data-name="password_input"]').val(),
                        'type' : 'register',
                    },
                    success:function(data){
                    	if(data.status){
                            alertify.success(data.message);
                            goto(data.url);
                        } 
                        else{
                            if(data.isValidateError){
                                let message_string = "";
                                $.each(data.errors,function(name,message){
                                    message_string += message + '<br>'; 
                                })
                                alertify
                                .alert("Thông báo",message_string, function(){
                                    
                                });
                            }   
                            else{
                                alertify
                                .alert("Thông báo",data.message, function(){
                                    
                                });
                            }
                        }
                    }
                });
    	})
    </script>
</body>
</html>