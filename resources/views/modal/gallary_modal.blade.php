    <!-- Model -->
    <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
          <form id="formid" method="post" enctype="multipart/form-data">
		        <div class="modal-body">
              <div class="row">   
                {{csrf_field()}}
                <div class="col-md-9">
                <label for="title">Clint name</label>
                <input type="text" name="gal_name" id="gal_name" class="form-control">
                </div>
                <div class="col-md-9">
                <label for="title">Discription</label>
                <textarea name="gal_discription" id="gal_discription" class="form-control" cols="20" rows="5"></textarea>
                </div>
                <div class="col-md-12 image-input-div">
                <label for="i_qty">Images</label><br>
                <input type="file" class="btn btn-light" name="select_file[]" id="select_file" multiple="true" /> 
                </div>
                <div class="col-md-12">
                <label for="i_qty">Date</label><br>
                <input type="date" class="btn btn-light" name="date" id="date" multiple="true" /> 
                </div>
                <div class="col-md-12" id="pic"></div>
                <input type="hidden" name="gal_id" id="gal_id"> 
                <input type="hidden" name="old_pic_name" id="old_pic_name"> 
              </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-submite">Save changes</button>
            </div>
        </form>
		</div>
	  </div>
	</div>