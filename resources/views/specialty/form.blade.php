<div class="modal fade" id="formSpecialtyModal" tabindex="-1" role="dialog">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <form id="specialtyForm" action="{{ route('savespecialty') }}" method="post" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <div class="container-fluid">

          <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">

              <div class="card">

                <div class="header">

                  <h2><strong>Specialty</strong> Data</h2>

                </div>

                <div class="card-body">

                  <input type="hidden" value="0" id="id" name="id">

                  <label>Name</label>

                  <div class="form-group"> <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required /> </div>

                  <label>Company</label>

                  <select class="form-control show-tick" id="companyid" name="companyid" required>

                    @if(count($companys)>0)

                    @foreach($companys as $company) <option value="{{ $company->id }}">{{ $company->fullname }}</option> @endforeach

                    @else <option value="">No data</option> @endif

                  </select>

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