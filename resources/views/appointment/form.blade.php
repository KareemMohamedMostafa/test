<div class="modal fade" id="formAppointmentModal" tabindex="-1" role="dialog">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <form id="appointmentForm" action="{{ route('saveappointment') }}" method="post" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <div class="container-fluid">

          <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">

              <div class="card">

                <div class="header">

                  <h2><strong>Appointment</strong> Data</h2>

                </div>

                <div class="card-body">

                  <div class="row">

                    <div class="col-md-6">

                      <label>Subject</label>

                      <div class="form-group"> <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter subject" required> </div>

                      <label>Start time</label>

                      <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-calendar"></i> </span> <input type="text" id="start" name="start" class="form-control datetimepicker" placeholder="Please choose starting date & time..."> </div>

                      <label>Finish time</label>

                      <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-calendar"></i> </span> <input type="text" id="finish" name="finish" class="form-control datetimepicker" placeholder="Please choose finishing date & time..."> </div>

                    </div>

                    <div class="col-md-6">

                      <input type="hidden" value="0" id="id" name="id">

                      <label>Room</label>

                      <select class="form-control show-tick" id="roomid" name="roomid" required>

                        @if(count($rooms)>0)

                        @foreach($rooms as $room) <option value="{{ $room->id }}">{{ $room->name }}</option> @endforeach

                        @else <option value="">No data</option> @endif

                      </select>

                      <label>Doctor</label>

                      <select class="form-control show-tick" id="doctorid" name="doctorid" required>

                        @if(count($doctors)>0)

                        @foreach($doctors as $doctor) <option value="{{ $doctor->id }}">{{ $doctor->fullname }}</option> @endforeach

                        @else <option value="">No data</option> @endif

                      </select>

                      <label>Patient</label>

                      <select class="form-control show-tick" id="patientid" name="patientid" required>

                        @if(count($patients)>0)

                        @foreach($patients as $patient) <option value="{{ $patient->id }}">{{ $patient->fullname }}</option> @endforeach

                        @else <option value="">No data</option> @endif

                      </select>

                    </div>

                  </div>

                </div>

              </div>

              <div class="card">

                <div class="header">

                  <h2><strong>Notes</strong> data</h2>

                </div>

                <div class="card-body">

                  <div class="row">

                    <div class="col-md-12">

                      <label>Add some notes here ...</label>

                      <div class="form-group"> <textarea id="notes" name="notes" class="form-control" placeholder="Enter notes"> </textarea> </div>

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