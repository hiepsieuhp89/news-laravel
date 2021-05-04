<div class="modal fade hidden" action="delete" target='news' tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div style="max-width: 1000px;margin: auto;max-height: 90%;" role="document">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Xóa bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" action="delete" target='news'  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <form class="" action="{{ route('admin.database.news.delete') }}" method="post" enctype="multipart/form-data" entity-name="news" id="news_delete_form">
        @csrf
        <input class="form-control hidden" type="text" name="id" value="">
        <div class="row">
          <div class="col-md-12">
            <p>Bạn có thật sự muốn xóa bản ghi</p>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
        <button type="button" class="btn btn-primary submit-btn" action="delete" target="news" form_target="news_delete_form">Xóa</button>
      </div>
    </div>
  </div>
</div>