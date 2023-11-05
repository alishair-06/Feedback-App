<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formid">
        @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="msg" id="msg"></textarea>
          </div>
          <div class="form-group">
            <label for="select_file" class="col-form-label">Add images:</label>
            <input type="file" class="btn btn-light ml-md-3" name="select_file[]" id="select_file" multiple="true" />
          </div>
          <div class="form-group row" id="pic">
          </div>
          <input type="hidden" class="btn btn-light ml-3" name="rird" id="rird"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-submite">Add my Review</button>
        </div>
      </form>
    </div>
  </div>
</div>