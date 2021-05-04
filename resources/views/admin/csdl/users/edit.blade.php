<div class="modal fade hidden" action="edit" target='users' tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sửa danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" action="edit" target='users' aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <form class="" action="{{ route('admin.database.users.edit') }}" method="post" enctype="multipart/form-data" entity-name="users" id="users_edit_form">
        	<input class="form-control hidden" type="text" name="id" value="">
        @csrf
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label name="name" data-toggle="popover" data-content="Hãy nhập tên danh mục" for="">Tên danh mục</label>
                    <textarea type="text" name='name' class="form-control" placeholder="Tên danh mục"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="button" class="btn btn-primary submit-btn" action="edit" target="users" form_target="users_edit_form">Lưu</button>
      </div>
    </div>
</div>