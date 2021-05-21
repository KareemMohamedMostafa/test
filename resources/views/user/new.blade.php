<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <form id="newUserForm" action="{{ route('createuser') }}" method="post" enctype="multipart/form-data">

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

                      <label>Fullname</label>

                      <div class="form-group"> <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required /> </div>

                      <label>Email address</label>

                      <div class="form-group"> <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required /> </div>

                      <label>Password</label>

                      <div class="form-group"> <input type="password" id="password" name="password" class="form-control" minlength="6" placeholder="Enter password" required /> </div>

                    </div>

                    <div class="col-md-6">

                      <label>Role</label>

                      <select class="form-control show-tick" id="role" name="role" required>

                        @if (Auth::user()->role == 'admin')

                        @if(count($roles)>0)

                        @foreach($roles as $rol) <option value="{{ $rol }}">{{ $rol }}</option> @endforeach

                        @else <option value="visitor">Visitor</option> @endif

                        @endif

                      </select>

                      <label>Image</label>

                      <div class="form-group"> <input type="file" id="image" name="image" class="form-control"> </div>

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