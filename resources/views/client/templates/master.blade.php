<!DOCTYPE html>
<html>
<head>
<base href="{{ asset('') }}">
<title>VnPoint</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="shortcut icon" type="image/png" href="logo.png"/>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link href="alertifyjs/css/alertify.min.css" rel="stylesheet">
@yield('meta-section')
<style>
	ul.news_sticker a{
		font-size: 14px;
	}
</style>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body class="msb-x">

	<!-- Load Facebook SDK for JavaScript -->
      <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="100897248703274">
      </div>

	@include('client.templates.header')
	@yield('content')
	@include('client.templates.footer')
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/slick.min.js"></script>
	<script src="assets/js/jquery.li-scroller.1.0.js"></script>
	<script src="assets/js/jquery.newsTicker.min.js"></script>
	<script src="assets/js/jquery.fancybox.pack.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/snow.js"></script>
	<script src="alertifyjs/alertify.min.js"></script>
	<script src="https://kit.fontawesome.com/12065bbb1f.js" crossorigin="anonymous"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=1202321176855493&autoLogAppEvents=1" nonce="TDFmFlo4"></script>
	<script>
		var snowMax = 35;

		// Snowflake Colours
		var snowColor = ["#DDD", "#EEE"];

		// Snow Entity
		var snowEntity = "&#x2022;";

		// Falling Velocity
		var snowSpeed = 0.5;

		// Minimum Flake Size
		var snowMinSize = 8;

		// Maximum Flake Size
		var snowMaxSize = 24;

		// Refresh Rate (in milliseconds)
		var snowRefresh = 30;

		// Additional Styles
		var snowStyles = "cursor: default; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; -o-user-select: none; user-select: none;";
		var csrfToken = '{{ csrf_token() }}';
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN' : csrfToken
			}
		})
	</script>
	<script type="text/javascript">
	$('video').attr('controls',"");
	$('.menu-button').on('click',function(){
        $('.menu-item').addClass('hidden');
        $('.menu-button').removeClass('active');
        $(this).addClass('active');
        $('.menu-item[data-index='+ $(this).attr('item-target') +']').removeClass('hidden');
    })
    $('#update_account_information_btn').click(function(){

    	var formData = new FormData(document.getElementById($(this).attr('target_form')));
    	$.ajax({
	    	type : 'POST',
	    	url : '{{ route('client.account.update') }}',
	    	contentType: false,
            cache: false,
            processData: false,
	    	data: formData,
	    	success:function(data){
	    		if(data.status){
                        alertify.success(data.message);
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
	    })
    })
    $('.tool-button .love-button').on('click',function(){
    	var button = this;
    	if($(this).attr('action') == 'pin'){
    		$.ajax({
	    		type : 'POST',
	    		url : '{{ route('client.pinnew') }}',
	    		dataType : 'json',
	    		data: {
	    			'user_id' : '{{ Auth::id() }}',
	    			'post_id' : $(this).attr('data-id'),
	    			'action' : $(this).attr('action'),
	    		},
	    		success:function(data){
	    			$(button).addClass('checked').attr('action','unpin').html('<i class="fas fa-heart"></i>');
	    			alertify.success(data.message);
	    		}
	    	})
    	}
    	if($(this).attr('action') == 'unpin'){
    		$.ajax({
	    		type : 'POST',
	    		url : '{{ route('client.unpinnew') }}',
	    		dataType : 'json',
	    		data: {
	    			'user_id' : '{{ Auth::id() }}',
	    			'post_id' : $(this).attr('data-id'),
	    			'action' : $(this).attr('action'),
	    		},
	    		success:function(data){
	    			$(button).removeClass('checked').attr('action','pin').html('<i class="far fa-heart"></i>');
	    			alertify.success(data.message);
	    		}
	    	})
    	}
    })
	</script>
<script>
    (function(){
  $('#msbo').on('click', function(){
    $('body').toggleClass('msb-x');
  });
}());
</script>
</body>
</html>
