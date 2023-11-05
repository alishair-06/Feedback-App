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
                <label for="title">Package title</label>
                <input type="text" name="pkg_name" id="pkg_name" class="form-control">
                </div>
                <div class="col-md-7 ">
                <label for="multi_items"> <h5>Package contains</h5></label>
                <select class="js-example-basic-multiple" id="" name="multi_items[]" multiple="multiple">
                @foreach($items as $item)
                  <option value="{{$item->itemid}}">{{$item->item_title}}</option>
                @endforeach
                </select>
                </div>
                <div class="col-md-9">
                <label for="title">Discription</label>
                <textarea name="pkg_discription" id="pkg_discription" class="form-control" cols="20" rows="5"></textarea>
                </div>
                <div class="col-md-9">
                <label for="pak_discription_t">Discription 2</label>
                <textarea name="pak_discription_t" id="pak_discription_t" class="form-control" cols="20" rows="5"></textarea>
                </div>
                <div class="col-md-9">
                <label for="title">Package Parice</label>
                <input type="number" name="pkg_price" id="pkg_price" class="form-control">
                </div>
                <div class="col-md-4">
                <label for="discription">Package Status</label>
                <select name="b_status" id="b_status" class="form-control">
                  <option>Active</option>
                  <option>Non-active</option>
                </select>
                </div>
                <div class="col-md-4">
                <label for="discription">featuring number</label>
                <input type="number" class="form-control" id="f_id" name="f_id">
                </div>
                <div class="col-md-12 image-input-div">
                <label for="i_qty">Images</label><br>
                <input type="file" class="btn btn-light" name="select_file[]" id="select_file" /> 
                </div>
                <div class="col-md-12" id="pic"></div>
                <hr>
                
                
                <div class="col-md-12" id="child_items"></div>
                <input type="hidden" name="pkg_id" id="pkg_id"> 
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