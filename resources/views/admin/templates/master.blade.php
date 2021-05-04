<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <base href="{{ asset('AdminLTE-3.0.5') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Trang quản trị</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="AdminLTE-3.0.5/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="AdminLTE-3.0.5/dist/css/adminlte.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link href="alertifyjs/css/alertify.min.css" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
	@include('admin.templates.header')
	@yield('content')
	@include('admin.templates.footer')
		<script src="AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="AdminLTE-3.0.5/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="AdminLTE-3.0.5/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="AdminLTE-3.0.5/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="AdminLTE-3.0.5/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="AdminLTE-3.0.5/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="AdminLTE-3.0.5/plugins/moment/moment.min.js"></script>
        <script src="AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="AdminLTE-3.0.5/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="AdminLTE-3.0.5/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="AdminLTE-3.0.5/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="AdminLTE-3.0.5/dist/js/AdminLTE-3.0.5/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="AdminLTE-3.0.5/dist/js/demo.js"></script>
        <script src="AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
        <script src="alertifyjs/alertify.min.js"></script>
        <script>
        $('[data-toggle="popover"]').popover();   
        var CKeditor_news_add_create, 
        CKeditor_news_edit_create, 
        entity, method;
        var csrfToken = '{{ csrf_token() }}';
          $(function () {
            $("#newstable1").DataTable({
              "responsive": true,
              "autoWidth": false,
            });
            $('#authorsTable').DataTable({
              "paging": true,
              "autoWidth": true,
              "responsive": true,
            });
            $('#userTable').DataTable({
              "paging": true,
              "autoWidth": true,
              "responsive": true,
            });
            $('#chillCategoryTable').DataTable({
              "paging": true,
              "autoWidth": true,
              "responsive": true,
            });
            
            $('#newstable').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": true,
              "responsive": true,
            });
          });
            function readURL(input,form) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('form#'+form+' div.image-preview img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
              }
            }
            function objectifyForm(formArray) {
                //serialize data function
                var returnArray = {};
                for (var i = 0; i < formArray.length; i++){
                    returnArray[formArray[i]['name']] = formArray[i]['value'];
                }
                return returnArray;
            }
        $('select[name="category"]').on('change',function(){
            let modal = $(this).attr('modal');
            $.ajax({
                method : 'get',
                url : "{{ route('admin.database.get') }}",
                data : {
                    'category_id' : $(this).val(),
                    'name' : 'chillCategorys',
                },
                success:function(data){
                    //data is an object array
                    let html = '';
                    $.each(data, function(index, value){
                        html += '<option value="'+ value.id +'">'+ value.name +'</option>>';
                    })
                    $('select[name="chill_category"][modal="'+ modal +'"]').html(html);
                }
            })
        })
        ClassicEditor.create( document.querySelector( '#news_addEditor' ),{
            cloudServices: {
                tokenUrl: 'https://79706.cke-cs.com/token/dev/af56e5d5d627d274a2fa79f578d88df980122da9270f604c9e7e05feb11f',
                uploadUrl: 'https://79706.cke-cs.com/easyimage/upload/'
            }
        } )
        .then( editor => {
            CKeditor_news_add_create = editor;
        } )
        .catch( error => {
            console.error( error );
        });
         ClassicEditor.create( document.querySelector( '#news_editEditor' ),{
            cloudServices: {
                tokenUrl: 'https://79706.cke-cs.com/token/dev/af56e5d5d627d274a2fa79f578d88df980122da9270f604c9e7e05feb11f',
                uploadUrl: 'https://79706.cke-cs.com/easyimage/upload/'
            }
        } )
        .then( editor => {
            CKeditor_news_edit_create = editor;
        } )
        .catch( error => {
            console.error( error );
        });

        $('input[type="file"]').change(function(e) {

          readURL(this,$(this).attr('form_target'));
        });
        $('button.close').click(function(){
            $('div.modal[action="'+ $(this).attr('action') +'"][target="'+ $(this).attr('target') +'"]').addClass('hidden').addClass('fade');
        })
        $('.database_action').click(function(){
            let action = $(this).attr('action');
            let target = $(this).attr('target');
            if(action == "edit" || action == "delete"){
                $.ajax({
                    method : 'post',
                    url : $(this).attr('url'),
                    data : {
                        'id' : $(this).attr('data_id')
                    },
                    success:function(data){
                        $.each(data,function(index,value){
                            if(index != "image" && index!="description")
                                $('.modal[action="'+ action +'"][target="'+ target +'"] .form-control[name="'+ index +'"]').val(value);
                        });
                        $('.modal[action="'+ action +'"][target="'+ target +'"] div.image-preview img').attr('src', data.image);
                        if(data.description)
                            CKeditor_news_edit_create.setData(data.description);

                        $('.modal[action="'+ action +'"][target="'+ target +'"]').removeClass('hidden').removeClass('fade');
                    }   
                })
            }
            if(action == "add" || action == "delete"){
                $('.modal[action="'+ action +'"][target="'+ target +'"]').removeClass('hidden').removeClass('fade');
            }   
        })
        $('.submit-btn[target="news"]').click(function(){
            //get method to database(add or edit or delete)
            let action = $(this).attr('action');

            //lấy bảng đang tương tác
            let target = $(this).attr('target');

            //lấy form mà đang tương tác
            let form_target = $(this).attr('form_target');
            let modal = $('div.modal[action="'+ action +'"][target="'+ target +'"]');
            var url;
            if(action == "delete"){
                url = "{{ route('admin.database.news.delete') }}";
                let formData = new FormData(document.getElementById(form_target));
                formData.append('form_id',form_target);
                $.ajax({
                    method : 'post',
                    url : url,
                    data : formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        if(!data.status){
                            $.each(data.errors,function(index,value){
                                $('form#'+data.form_id+' .form-control[name="'+ index +'"]').addClass('is-invalid').parent().find('.invalid-feedback').html(value[0]).show();
                            })
                        }
                        if(data.status){
                            modal.addClass('hidden');
                            alertify.success(data.message);
                        }
                    }
                })
                return 0;
            }
            if(action == "add" || action == "edit"){
                if(action == "add"){
                    url = "{{ route('admin.database.news.add') }}";
                }
                if(action == "edit"){
                    url = "{{ route('admin.database.news.edit') }}";
                }
                let formData = new FormData(document.getElementById(form_target));
                var files = ($('div[action="'+ action +'"][target="'+ target +'"] input[type="file"][name="image"]')[0].files).length>0?$('div[action="'+ action +'"][target="'+ target +'"] input[type="file"][name="image"]')[0].files:'';
                let description = CKeditor_news_add_create.getData();
                formData.append('form_id',form_target);
                formData.append('description',description); 
                $.ajax({
                    method : 'post',
                    url : url,
                    data : formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        if(!data.status){
                            $.each(data.errors,function(index,value){
                                $('form#'+data.form_id+' .form-control[name="'+ index +'"]').addClass('is-invalid').parent().find('.invalid-feedback').html(value[0]).show();
                            })
                        }
                        if(data.status){
                            modal.addClass('hidden');
                            alertify.success(data.message);
                        }
                    }
                })
                return 0;
            }
        })
        $('.submit-btn[target="categorys"]').click(function(){
            //get method to database(add or edit or delete)
            let action = $(this).attr('action');
            //lấy bảng đang tương tác
            let target = $(this).attr('target');
            //lấy form mà đang tương tác
            let form_target = $(this).attr('form_target');

            let modal = $('div.modal[action="'+ action +'"][target="'+ target +'"]');

            var url;
            if(action == "add"){
                url = "{{ route('admin.database.categorys.add') }}";
            }
            if(action == "edit"){
                url = "{{ route('admin.database.categorys.edit') }}";
            }
            if(action == "delete"){
                url = "{{ route('admin.database.categorys.delete') }}";
                let formData = new FormData(document.getElementById(form_target));
                formData.append('form_id',form_target);
                $.ajax({
                    method : 'post',
                    url : url,
                    data : formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        if(!data.status){
                            $.each(data.errors,function(index,value){
                                $('form#'+data.form_id+' .form-control[name="'+ index +'"]').addClass('is-invalid').parent().find('.invalid-feedback').html(value[0]).show();
                            })
                        }
                        if(data.status){
                            modal.addClass('hidden');
                            alertify.success(data.message);
                        }
                    }
                })
                return 0;
            }
            //tạo formdata từ form đang tương tác
            let formData = new FormData(document.getElementById(form_target));
            formData.append('form_id',form_target);
            $.ajax({
                method : 'post',
                url : url,
                data : formData,
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    if(!data.status){
                        $.each(data.errors,function(index,value){
                            $('form#'+data.form_id+' .form-control[name="'+ index +'"]').addClass('is-invalid').parent().find('.invalid-feedback').html(value[0]).show();
                        })
                    }
                    if(data.status){
                        modal.addClass('hidden');
                        alertify.success(data.message);
                    }
                }
            })
            return 0;
        })
        $('.submit-btn[target="chill_categorys"]').click(function(){
            //get method to database(add or edit or delete)
            let action = $(this).attr('action');
            //lấy bảng đang tương tác
            let target = $(this).attr('target');
            //lấy form mà đang tương tác
            let form_target = $(this).attr('form_target');

            let modal = $('div.modal[action="'+ action +'"][target="'+ target +'"]');

            var url;
            if(action == "add"){
                url = "{{ route('admin.database.chill_categorys.add') }}";
            }
            if(action == "edit"){
                url = "{{ route('admin.database.chill_categorys.edit') }}";
            }
            if(action == "delete"){
                url = "{{ route('admin.database.chill_categorys.delete') }}";
                let formData = new FormData(document.getElementById(form_target));
                formData.append('form_id',form_target);
                $.ajax({
                    method : 'post',
                    url : url,
                    data : formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        if(!data.status){
                            $.each(data.errors,function(index,value){
                                $('form#'+data.form_id+' .form-control[name="'+ index +'"]').addClass('is-invalid').parent().find('.invalid-feedback').html(value[0]).show();
                            })
                        }
                        if(data.status){
                            modal.addClass('hidden');
                            alertify.success(data.message);
                        }
                    }
                })
                return 0;
            }
            //tạo formdata từ form đang tương tác
            let formData = new FormData(document.getElementById(form_target));
            formData.append('form_id',form_target);
            $.ajax({
                method : 'post',
                url : url,
                data : formData,
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    if(!data.status){
                        $.each(data.errors,function(index,value){
                            $('form#'+data.form_id+' .form-control[name="'+ index +'"]').addClass('is-invalid').parent().find('.invalid-feedback').html(value[0]).show();
                        })
                    }
                    if(data.status){
                        modal.addClass('hidden');
                        alertify.success(data.message);
                    }
                }
            })
            return 0;
        })
        $('.submit-btn[target="authors"]').click(function(){
            //get method to database(add or edit or delete)
            let action = $(this).attr('action');
            //lấy bảng đang tương tác
            let target = $(this).attr('target');
            //lấy form mà đang tương tác
            let form_target = $(this).attr('form_target');

            let modal = $('div.modal[action="'+ action +'"][target="'+ target +'"]');

            var url;
            if(action == "add"){
                url = "{{ route('admin.database.authors.add') }}";
            }
            if(action == "edit"){
                url = "{{ route('admin.database.authors.edit') }}";
            }
            if(action == "delete"){
                url = "{{ route('admin.database.authors.delete') }}";
                let formData = new FormData(document.getElementById(form_target));
                formData.append('form_id',form_target);
                $.ajax({
                    method : 'post',
                    url : url,
                    data : formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        if(!data.status){
                            $.each(data.errors,function(index,value){
                                $('form#'+data.form_id+' .form-control[name="'+ index +'"]').addClass('is-invalid').parent().find('.invalid-feedback').html(value[0]).show();
                            })
                        }
                        if(data.status){
                            modal.addClass('hidden');
                            alertify.success(data.message);
                        }
                    }
                })
                return 0;
            }
            //tạo formdata từ form đang tương tác
            let formData = new FormData(document.getElementById(form_target));
            formData.append('form_id',form_target);
            $.ajax({
                method : 'post',
                url : url,
                data : formData,
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    if(!data.status){
                        $.each(data.errors,function(index,value){
                            $('form#'+data.form_id+' .form-control[name="'+ index +'"]').addClass('is-invalid').parent().find('.invalid-feedback').html(value[0]).show();
                        })
                    }
                    if(data.status){
                        modal.addClass('hidden');
                        alertify.success(data.message);
                    }
                }
            })
            return 0;
        })
        $.ajaxSetup({headers:{'X-CSRF-TOKEN' : csrfToken}})
        </script>
    </body>
</html>