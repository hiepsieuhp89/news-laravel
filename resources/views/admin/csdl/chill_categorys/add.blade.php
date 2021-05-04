<div class="modal fade hidden" action="add" target='chill_categorys' tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh mục con</h5>
        <button type="button" class="close" data-dismiss="modal" action="add" target='chill_categorys' aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <form class="" action="{{ route('admin.database.chill_categorys.add') }}" method="post" enctype="multipart/form-data" entity-name="chill_categorys" id="chill_categorys_add_form">
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
              <div class="col-md-12">
                <div class="form-group">
                    <label name="category" data-toggle="popover" data-content="Hãy chọn danh mục lớn" for="">Danh mục lớn</label>
                    <select type="text" name="categoryId" modal="add_database" class="form-control">
                      <option value="">Chọn danh mục cha</option>
                      @foreach($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
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
        <button type="button" class="btn btn-primary submit-btn" action="add" target="chill_categorys" form_target="chill_categorys_add_form">Thêm</button>
      </div>
    </div>
</div>