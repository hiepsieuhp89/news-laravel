<div class="modal fade hidden" action="edit" target='news' tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sửa bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" action="edit" target='news'  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <form class="" action="{{ route('admin.database.news.edit') }}" method="post" enctype="multipart/form-data" entity-name="news" id="news_edit_form">
        	<input class="form-control hidden" type="text" name="id" value="">
        @csrf
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label name="title" data-toggle="popover" data-content="Hãy nhập tiêu đề" for="">Tiêu đề bài viết</label>
                    <textarea type="text" name='title' class="form-control" placeholder="Tiêu đề bài viết"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label name="first_look" data-toggle="popover" data-content="Hãy nhập tóm tắt nội dung" for="">Tóm tắt nội dung ngắn</label>
                    <textarea type="text" name='first_look' class="form-control" placeholder="Tóm tắt nội dung ngắn"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label name="category" data-toggle="popover" data-content="Hãy chọn danh mục lớn" for="">Danh mục lớn</label>
                    <select type="text" name="category" modal="add_database" class="form-control">
                      @foreach($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label name="chill_category" data-toggle="popover" data-content="Hãy chọn danh mục con" for="">Danh mục liên kết</label>
                    <select type="text" name="chill_category" modal="add_database" class="form-control">
                      @foreach($chillCategorys as $chillCategory)
                        <option value="{{ $chillCategory->id }}">{{ $chillCategory->name }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label name="author" data-toggle="popover" data-content="Hãy chọn tác giả" for="">Tác giả</label>
                    <select type="text" name="author" class="form-control">
                      @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label name="source" data-toggle="popover" data-content="Hãy chọn nguồn" for="">Nguồn</label>
                    <select type="text" name="source" class="form-control">
                      @foreach($sources as $source)
                        <option value="{{ $source->id }}">{{ $source->name }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label name="image" data-toggle="popover" data-content="Hãy chọn ảnh đại diện" for="">Ảnh</label>
                <input type="file" accept="image/*" form_target='news_edit_form' name="image" class="form-control" placeholder="Ảnh">
                <div class="image-preview" style="margin: 20px;">
                  <img class="image-preview" id="new_image_input" name="new_image" style="width: 100%;" src="" alt="">
                </div>
                <div class="invalid-feedback"></div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
                <label name="description" data-toggle="popover" data-content="Hãy nhập mô tả bài viết" for="">Mô tả</label>
                <div id="news_editEditor" class="form-control" name="description">
                  <p>Nhập mô tả</p>
                </div>
                <div class="invalid-feedback"></div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button type="button" class="btn btn-primary submit-btn" action="edit" target="news" form_target="news_edit_form">Lưu</button>
      </div>
    </div>
</div>