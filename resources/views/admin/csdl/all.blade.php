@extends('admin.templates.master')
@section('title')
Cơ sở dữ liệu
@endsection
@section('content')
	<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- category -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
              	<div class="card-tools">
                  <button class="btn btn-primary database_action" action='add' target='categorys'>Thêm</button>
                </div>
                <h3 class="card-title">Danh mục</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="categorystable" class="table table-bordered table-hover dataTable">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">Mã</th>
                      <th>Tên</th>
                      <th aria-controls="chillCategoryTable" rowspan="1" colspan="1">Công cụ</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categorys as $category)
                    <tr role="row" class="odd">
                      <td tabindex="0" class="sorting_1">{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td class="d-flex">
                        <div class="tool database_action m-1" url="{{ route('admin.database.categorys.get') }}" action='edit' target='categorys' data_id = "{{ $category->id }}">
                          <i class="far fa-edit"></i>
                        </div>
                        <div class="tool database_action m-1" url="{{ route('admin.database.categorys.get') }}" action='delete' target='categorys' data_id = "{{ $category->id }}">
                          <i class="far fa-trash-alt"></i>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- author -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tác giả</h3>
                <div class="card-tools">
                  <button class="btn btn-primary database_action" action='add' target='authors'>Thêm</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="authors_database" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="authorTable" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="newstable_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="authorTable" rowspan="1" colspan="1" aria-sort="ascending">Mã</th>
                      <th class="sorting" tabindex="0" aria-controls="authorTable" rowspan="1" colspan="1">Tên</th>
                      <th class="sorting" tabindex="0" aria-controls="authorTable" rowspan="1" colspan="1">Trang cá nhân</th>
                      <th aria-controls="chillCategoryTable" rowspan="1" colspan="1">Công cụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                    <tr role="row" class="odd">
                      <td tabindex="0" class="sorting_1">{{ $author->id }}</td>
                      <td>{{ $author->name }}</td>
                      <td>{{ $author->url }}</td>
                      <td class="d-flex">
                        <div class="tool database_action m-1" url="{{ route('admin.database.authors.get') }}" action='edit' target='authors' data_id = "{{ $author->id }}">
                          <i class="far fa-edit"></i>
                        </div>
                        <div class="tool database_action m-1" url="{{ route('admin.database.authors.get') }}" action='delete' target='authors' data_id = "{{ $author->id }}">
                          <i class="far fa-trash-alt"></i>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
              </div>
                </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- chill category -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh mục con</h3>
                <div class="card-tools">
                  <button class="btn btn-primary database_action" action='add' target='chill_categorys'>Thêm</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="chillCategorys_database" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="chillCategoryTable" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="newstable_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="chillCategoryTable" rowspan="1" colspan="1" aria-sort="ascending">Mã</th>
                      <th class="sorting" tabindex="0" aria-controls="chillCategoryTable" rowspan="1" colspan="1">Tên</th>
                      <th class="sorting" tabindex="0" aria-controls="chillCategoryTable" rowspan="1" colspan="1">Nguồn</th>
                      <th aria-controls="chillCategoryTable" rowspan="1" colspan="1">Công cụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($chillCategorys as $chillCategory)
                    <tr role="row" class="odd">
                      <td tabindex="0" class="sorting_1">{{ $chillCategory->id }}</td>
                      <td>{{ $chillCategory->name }}</td>
                      <td>{{ $chillCategory->category->name }}</td>
                      <td class="d-flex">
                        <div class="tool database_action m-1" url="{{ route('admin.database.chill_categorys.get') }}" action='edit' target='chill_categorys' data_id = "{{ $chillCategory->id }}">
                          <i class="far fa-edit"></i>
                        </div>
                        <div class="tool database_action m-1" url="{{ route('admin.database.chill_categorys.get') }}" action='delete' target='chill_categorys' data_id = "{{ $chillCategory->id }}">
                          <i class="far fa-trash-alt"></i>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
              </div>
                </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              	<div class="card-tools">
                  <button class="btn btn-primary database_action" url="{{ route('admin.database.news.add') }}" action='add' target='news'>Thêm</button>
                </div>
                <h3 class="card-title">Tin tức</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="news_database" class="dataTables_wrapper dt-bootstrap4">
                	<div class="row">
                		<div class="col-sm-12">
                			<table id="newstable" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="newstable_info">
                    <thead>
                    <tr role="row">
                    	<th class="sorting_asc" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1" aria-sort="ascending">Mã</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1">Tiêu đề</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1">Danh mục</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1">Nguồn</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1">Tác giả</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1" >Ngày đăng</th>
                      <th>Công cụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                    <tr role="row" class="odd">
                      <td tabindex="0" class="sorting_1">{{ $new->id }}</td>
                      <td>{{ $new->title }}</td>
                      <td>{{ $new->getCategory->name }} - {{ $new->getChillCategory->name }}</td>
                      <td>{{ $new->source_created->name }}</td>
                      <td>{{ $new->author_created->name }}</td>
                      <td>{{ $new->id }}</td>
                      <td class="d-flex">
                        <div class="tool database_action m-1" url="{{ route('admin.database.news.get') }}" action='edit' target='news' data_id = "{{ $new->id }}">
                          <i class="far fa-edit"></i>
                        </div>
                        <div class="tool database_action m-1" url="{{ route('admin.database.news.get') }}" action='delete' target='news' data_id = "{{ $new->id }}">
                          <i class="far fa-trash-alt"></i>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                	</tbody>
                    <tfoot>
                    <tr>
                      <th class="sorting_asc" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1" aria-sort="ascending">Mã</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1" >Tiêu đề</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1" >Danh mục</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1" >Nguồn</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1">Tác giả</th>
                      <th class="sorting" tabindex="0" aria-controls="newstable" rowspan="1" colspan="1" >Ngày đăng</th>
                      <th>Công cụ</th>
                    </tr>
                    </tfoot>
                  </table>
              </div>
                </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- user -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Người dùng</h3>
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="users_database" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="userTable" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="newstable_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1" aria-sort="ascending">Mã</th>
                      <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1">Tên</th>
                      <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1">Email</th>
                      <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1">Số điện thoại</th>
                      <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1">Địa chỉ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr role="row" class="odd">
                      <td tabindex="0" class="sorting_1">{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone_number }}</td>
                      <td>{{ $user->address }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
              </div>
                </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@include('admin.csdl.news.add')
@include('admin.csdl.news.edit')
@include('admin.csdl.news.delete')

@include('admin.csdl.categorys.add')
@include('admin.csdl.categorys.edit')
@include('admin.csdl.categorys.delete')

@include('admin.csdl.chill_categorys.add')
@include('admin.csdl.chill_categorys.edit')
@include('admin.csdl.chill_categorys.delete')

@include('admin.csdl.authors.add')
@include('admin.csdl.authors.edit')
@include('admin.csdl.authors.delete')

@include('admin.csdl.sources.add')
@include('admin.csdl.sources.edit')
@include('admin.csdl.sources.delete')

@endsection