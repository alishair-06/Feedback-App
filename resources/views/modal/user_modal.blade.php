    <!-- Model -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Display errors if any -->
                
                <form id="formid" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            {{csrf_field()}}
                            <div class="col-md-8">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <label for="user_role">Select Role</label>
                                <Select class="form-control" name="user_role" id="user_role">
                                    <option value="1">Admin</option>
                                    <option value="0">Cashier</option>
                                </Select>
                            </div>
                            <div class="col-md-10">
                              @if ($errors->first('err'))
                              <div class="text-danger">
                                  {{ $errors->first('err') }}
                              </div>
                              @endif
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="col-md-10">
                                <label for="password">Password</label>
                                <div class="row">
                                <div class="col-11">
                                  <input type="password" name="password" id="password" class="form-control">
                                </div>
                                  <div class="col-1">
                                  <span><button type="button" class=" btn btn-dark mt-2 mr-2 icon-sm"> <i class="fas fa-eye eye_button"></i> </button></span>
                                  </div>
                                </div>
                                <div id="pswd_info my-2" class="text-danger" style="font-size : 9px">
                                    <ul>
                                        <li id="letter" class="d-none">At least <strong>one letter</strong></li>
                                    </ul>
                                </div>

                                </span>
                            </div>
                            <input type="hidden" name="i_id" id="i_id">
                            <input type="hidden" name="passwordhid" id="passwordhid">
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