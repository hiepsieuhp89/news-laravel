@extends('admin.templates.master')
@section('content')
	<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
              	<div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <div class="form-group">
                    	<input type="text" class="form-control" placeholder="Tìm kiếm">
                    </div>
                  </ul>
                </div>
                <h3 class="card-title">Bàn</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Mã</th>
                      <th>Tên</th>
                      <th style="width: 120px">Loại</th>
                      <th>Đơn giá nhập</th>
                      <th>Đơn giá bán</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>B1</td>
                      <td>Bàn ăn gỗ POP</td>
                      <td>Phòng ăn</td>
                      <td>10.000.000</td>
                      <td>18.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>B2</td>
                      <td>Bàn nước jazz</td>
                      <td>Phòng khách</td>
                      <td>14.000.000</td>
                      <td>23.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>B3</td>
                      <td>Bàn ăn Spring</td>
                      <td>Phòng ăn</td>
                      <td>7.000.000</td>
                      <td>11.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>B4</td>
                      <td>Bàn nhỏ Black</td>
                      <td>Phòng ngủ</td>
                      <td>5.000.000</td>
                      <td>8.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">

                <h3 class="card-title">Bàn</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Stt</th>
                      <th>Tên</th>
                      <th style="width: 150px">Loại</th>
                      <th>Đơn giá nhập</th>
                      <th>Đơn giá bán</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Bàn ăn gỗ POP</td>
                      <td>Phòng ăn</td>
                      <td>10.000.000</td>
                      <td>18.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Bàn nước jazz</td>
                      <td>Phòng khách</td>
                      <td>14.000.000</td>
                      <td>23.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Bàn ăn Spring</td>
                      <td>Phòng ăn</td>
                      <td>7.000.000</td>
                      <td>11.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Bàn nhỏ Black</td>
                      <td>Phòng ngủ</td>
                      <td>5.000.000</td>
                      <td>8.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tủ</h3>
                <div class="card-tools">
                	<ul class="pagination pagination-sm float-right">
                    <div class="form-group">
                    	<input type="text" class="form-control" placeholder="Tìm kiếm">
                    </div>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Mã</th>
                      <th>Tên</th>
                      <th style="width: 150px">Loại</th>
                      <th>Đơn giá nhập</th>
                      <th>Đơn giá bán</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>T1</td>
                      <td>Tủ gỗ POP</td>
                      <td>Phòng ăn</td>
                      <td>5.000.000</td>
                      <td>6.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>T2</td>
                      <td>Tủ jazz</td>
                      <td>Phòng khách</td>
                      <td>4.000.000</td>
                      <td>6.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>T3</td>
                      <td>Tủ Spring</td>
                      <td>Phòng ăn</td>
                      <td>2.000.000</td>
                      <td>3.000.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>T4</td>
                      <td>Tủ Black</td>
                      <td>Phòng ngủ</td>
                      <td>6.000.000</td>
                      <td>8.300.000</td>
                      <td>
                      	<i class="fas fa-edit"></i>
                      	<i class="far fa-trash-alt"></i>
                      </td>
                    </tr>

                </tbody>

                </table>
                <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Giường</h3>
                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Stt</th>
                      <th>Tên</th>
                      <th style="width: 150px">Loại</th>
                      <th>Đơn giá nhập</th>
                      <th>Đơn giá bán</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Tủ gỗ POP</td>
                      <td>Phòng ăn</td>
                      <td>5.000.000</td>
                      <td>6.300.000</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Tủ jazz</td>
                      <td>Phòng khách</td>
                      <td>4.000.000</td>
                      <td>6.300.000</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Tủ Spring</td>
                      <td>Phòng ăn</td>
                      <td>2.000.000</td>
                      <td>3.000.000</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Tủ Black</td>
                      <td>Phòng ngủ</td>
                      <td>6.000.000</td>
                      <td>8.300.000</td>
                    </tr>
                </tbody>
                </table>
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
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>134</td>
                      <td>Jim Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>494</td>
                      <td>Victoria Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>832</td>
                      <td>Michael Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>982</td>
                      <td>Rocky Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<div style="opacity: 1; display: block;" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div style="max-width: 1000px;" class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sửa sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-6">
        		<div class="row">
        			<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Mã sản phẩm</label>
			        	<input type="text" name="masp" class="form-control" placeholder="mã sản phẩm">
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Tên sản phẩm</label>
			        	<input type="text" name="masp" class="form-control" placeholder="tên sản phẩm">
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Loại sản phẩm</label>
			        	<input type="text" name="masp" class="form-control" placeholder="loại sản phẩm">
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Loại phòng</label>
			        	<input type="text" name="masp" class="form-control" placeholder="loại phòng">
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Giá nhập(Vnd)</label>
			        	<input type="text" name="masp" class="form-control" placeholder="giá nhập">
			        </div>
	        	</div>
        		<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Giá bán(Vnd)</label>
			        	<input type="text" name="masp" class="form-control" placeholder="giá bán">
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Kích thước(rộng * dài * cao)</label>
			        	<input type="text" name="masp" class="form-control" placeholder="kích thước">
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Vật liệu</label>
			        	<input type="text" name="masp" class="form-control" placeholder="vật liệu">
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Màu sắc</label>
			        	<input type="text" name="masp" class="form-control" placeholder="màu sắc">
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
			        	<label for="">Trạng thái</label>
			        	<input type="text" name="masp" class="form-control" placeholder="trạng thái">
			        </div>
	        	</div>
        		</div>
        	</div>
        	<div class="col-md-6">
        		<div class="col-md-12">
	        		<div class="form-group">
	        			<label for="">Ảnh</label>
			        	<div class="d-flex">
			        		<img style="height: 100px;" src="http://www.nhaxinh.com/photo/miami_table1.jpg" alt="">
			        		<img style="height: 100px;" src="http://www.nhaxinh.com/photo/miami_table2.jpg" alt="">
			        		<img style="height: 100px;" src="http://www.nhaxinh.com/photo/miami_table3.jpg" alt="">
			        	</div>
			        </div>
	        	</div>
	        	<div class="col-md-12">
	        		<div class="form-group">
			        	<label for="">Mô tả thêm</label>
			        	<textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
			        </div>
	        	</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="button" class="btn btn-primary">Cập nhật</button>
      </div>
    </div>
  </div>
</div>
@endsection
