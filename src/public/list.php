<div class="container">
    <div class="row">
      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" data-id="">
        <div class="form-group">
            <label for="note_edit_content">Note: <span id="note_edit_title"></span> </label>
            <textarea class="form-control" id="note_edit_content" rows="3"></textarea>
            <button type="button" id="note_save" class="btn btn-primary">Save Note</button>
        </div>
      </div>
      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        Note List
      </div>
      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row" id="note_list">
          <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4" data-id="" style="display:none;">
            <div class="card">
              <div class="card-header">
                Note :
              </div>
              <div class="card-body">
                <h5 class="card-title">Note : <span id="note_title"></span></h5>
                <p class="card-text" id="note_content"></p>
                <a href="javascript:;" class="btn btn-primary" id="note_edit"><i class="bi bi-pencil-square"></i></a>
                <a href="javascript:;" class="btn btn-primary" id="note_delete"><i class="bi bi-trash"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
