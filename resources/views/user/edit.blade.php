<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <form id="editUserForm" action="{{ route('saveuser') }}" method="post" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <div class="container-fluid">

          <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">

              <div class="card">

                <div class="header">

                  <h2><strong>User</strong> Data</h2>

                </div>

                <div class="card-body">

                  <div class="row">

                    <div class="col-md-6">

                      <input type="hidden" value="0" id="editid" name="editid">

                      <label>Fullname</label>

                      <div class="form-group"> <input type="text" id="editname" name="editname" class="form-control" placeholder="Enter name" required /> </div>

                      <label>Password</label>

                      <div class="form-group"> <input type="password" id="editpassword" name="editpassword" class="form-control" minlength="6" placeholder="Enter password" /> </div>

                    </div>

                    <div class="col-md-6">

                      <label>Role</label>

                      <select class="form-control show-tick" id="editrole" name="editrole" required>

                        @if(count($roles)>0)

                        @foreach($roles as $rol) <option value="{{ $rol }}">{{ ucfirst($rol) }}</option> @endforeach

                        @else <option value="">No data</option> @endif

                      </select>

                      <label>Image</label>

                      <div class="form-group"> <input type="file" id="editimage" name="editimage" class="form-control"> </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-success">Save</button>

        </div>

      </form>

    </div>

  </div>

</div>