<div class="modal fade hidden" action="add" target='authors' tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh mục cha</h5>
        <button type="button" class="close" data-dismiss="modal" action="add" target='authors' aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <form class="" action="{{ route('admin.database.authors.add') }}" method="post" enctype="multipart/form-data" entity-name="authors" id="authors_add_form">
        @csrf
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label name="name" data-toggle="popover" data-content="Hãy nhập tên tác giả" for="">Tên tác giả</label>
                    <textarea type="text" name='name' class="form-control" placeholder="Tên tác giả"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label name="url" data-toggle="popover" data-content="Hãy nhập trang xã hội" for="">Trang xã hội</label>
                    <textarea type="text" name='url' class="form-control" placeholder="Trang xã hội"></textarea>
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
        <button type="button" class="btn btn-primary submit-btn" action="add" target="authors" form_target="authors_add_form">Thêm</button>
      </div>
    </div>
</div>