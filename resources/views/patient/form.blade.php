<div class="modal fade" id="formPatientModal" tabindex="-1" role="dialog">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <form id="patientForm" action="{{ route('savepatient') }}" method="post" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <div class="container-fluid">

          <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">

              <div class="card">

                <div class="header">

                  <h2><strong>Patient</strong> Data</h2>

                </div>

                <div class="card-body">

                  <div class="row">

                    <div class="col-md-6">

                      <input type="hidden" value="0" id="id" name="id">

                      <label>Fullname</label>

                      <div class="form-group"> <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter fullname" required /> </div>

                      <label>Email address</label>

                      <div class="form-group"> <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required /> </div>

                      <label>Phone</label>

                      <div class="form-group"> <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone" required /> </div>

                    </div>

                    <div class="col-md-6">

                      <label>Full Address</label>

                      <div class="form-group"> <input type="text" id="address" name="address" class="form-control" placeholder="Enter address" /> </div>

                      <label>Birthdate</label>

                      <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-calendar"></i> </span> <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Enter birthdate"> </div>

                      <label>Image</label>

                      <div class="form-group"> <input type="file" id="image" name="image" class="form-control"> </div>

                    </div>

                  </div>

                </div>

              </div>

              <div class="card">

                <div class="header">

                  <h2><strong>Medical</strong> data</h2>

                </div>

                <div class="card-body">

                  <div class="row">

                    <div class="col-md-6">

                      <label>Height</label>

                      <div class="form-group"> <input type="text" id="height" name="height" class="form-control" placeholder="Enter height"> </div>

                      <label>Weight</label>

                      <div class="form-group"> <input type="text" id="weight" name="weight" class="form-control" placeholder="Enter weight"> </div>

                      <label>BMI</label>

                      <div class="form-group"> <input type="text" id="bmi" name="bmi" class="form-control" placeholder="Enter bmi"> </div>

                    </div>

                    <div class="col-md-6">

                      <label>Doctor</label>

                      <select class="form-control show-tick" id="doctorid" name="doctorid" required>

                        @if(count($doctors)>0)

                        @foreach($doctors as $doc) <option value="{{ $doc->id }}">{{ $doc->fullname }}</option> @endforeach

                        @else <option value="">No data</option> @endif

                      </select>

                      <label>Gender</label>

                      <div class="form-group">

                        <select class="form-control show-tick" id="gender" name="gender">

                          <option value="M">Male</option>

                          <option value="F">Female</option>

                        </select>

                      </div>

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