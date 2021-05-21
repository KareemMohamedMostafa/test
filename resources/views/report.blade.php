@extends('layouts.app')

@section('content')

<section class="content">

  <div class="block-header">

    <div class="row">

      <div class="col-lg-5 col-md-6 col-sm-12">

        <h2>All Appointments <small class="text-muted">Listing</small> </h2>

      </div>

      <div class="col-lg-7 col-md-6 col-sm-12 text-right">

        <a href="{{ url('reports/0') }}"><button type="button" class="btn btn-default btn-round hidden-sm-down float-right m-l-10"> Beginning </button> </a>

        <a href="{{ url('reports/365') }}"><button type="button" class="btn btn-info btn-round hidden-sm-down float-right m-l-10"> 365 </i> </button> </a>

        <a href="{{ url('reports/30') }}"><button type="button" class="btn btn-success btn-round hidden-sm-down float-right m-l-10"> 30 </i> </button> </a>

        <a href="{{ url('reports/7') }}"><button type="button" class="btn btn-info btn-round hidden-sm-down float-right m-l-10"> 7 </i> </button> </a>

        <a href="{{ url('reports/1') }}"><button type="button" class="btn btn-info btn-round hidden-sm-down float-right m-l-10"> Today </button> </a>

      </div>

    </div>

  </div>

  <div class="container-fluid">

    <div class="row clearfix">

      <div class="col-md-12">

        <div class="card patients-list">

          <div class="body">

            @if (count($results) > 0)

            <div class="table-responsive">

              @if (Auth::user()->role == 'admin')

              <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                <thead>

                  <tr>

                    <th>ID</th>

                    <th>Room</th>

                    <th>Doctor</th>

                    <th class="text-center">Start Time</th>

                    <th class="text-center">Finish Time</th>

                    <th>Patient</th>

                    <th>Subject</th>

                    <th class="text-center">Status</th>

                  </tr>

                </thead>

                <tbody>

                  @foreach($results as $result)

                  <tr>

                    <td>{{ $result->id }}</td>

                    <td>{{ $result->room->name }}</td>

                    <td><span class="list-icon"><img class="patients-img" src="{{ url('/getImage/' . $result->doctor->image) }}" /></span> {{ $result->doctor->fullname }}</td>

                    <td class="text-center">{{ \FormatTime::MediumTimeFilter($result->start) }}</td>

                    <td class="text-center">{{ \FormatTime::MediumTimeFilter($result->finish) }}</td>

                    <td><span class="list-icon"><img class="patients-img" src="{{ url('/getImage/' . $result->patient->image) }}" /></span> {{ $result->patient->fullname }}</td>

                    <td>{{ $result->subject }}</td>

                    <td class="text-center"><span class="badge badge-success">{{ $result->status }}</span></td>

                  </tr>

                  @endforeach

                </tbody>

              </table>

              @else

              <table class="table m-b-0 table-hover js-basic-example dataTable">

                <thead>

                  <tr>

                    <th>ID</th>

                    <th>Room</th>

                    <th>Doctor</th>

                    <th class="text-center">Start Time</th>

                    <th class="text-center">Finish Time</th>

                    <th>Patient</th>

                    <th>Subject</th>

                    <th class="text-center">Status</th>

                  </tr>

                </thead>

                <tbody>

                  @foreach($results as $result)

                  <tr>

                    <td>{{ $result->id }}</td>

                    <td>{{ $result->room->name }}</td>

                    <td><span class="list-icon"><img class="patients-img" src="{{ url('/getImage/' . $result->doctor->image) }}" /></span> {{ $result->doctor->fullname }}</td>

                    <td class="text-center">{{ \FormatTime::MediumTimeFilter($result->start) }}</td>

                    <td class="text-center">{{ \FormatTime::MediumTimeFilter($result->finish) }}</td>

                    <td><span class="list-icon"><img class="patients-img" src="{{ url('/getImage/' . $result->patient->image) }}" /></span> {{ $result->patient->fullname }}</td>

                    <td>{{ $result->subject }}</td>

                    <td class="text-center"><span class="badge badge-success">{{ $result->status }}</span></td>

                  </tr>

                  @endforeach

                </tbody>

              </table>

              @endif

            </div>

            @else <div class="alert alert-info">Empty data</div> @endif

          </div>

        </div>

      </div>

    </div>

  </div>

</section>

@endsection