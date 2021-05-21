@extends('layouts.app')

@section('content')

<section class="content home">

    <div class="block-header">

        <div class="row">

            <div class="col-lg-7 col-md-6 col-sm-12">

                <h2>Dashboard <small class="text-muted">Medical Appointments System</small> </h2>

            </div>

            <div class="col-lg-5 col-md-6 col-sm-12">

                <ul class="breadcrumb float-md-right">

                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>

                </ul>

            </div>

        </div>

    </div>

    <div class="container-fluid">

        <div class="row clearfix">

            <div class="col-lg-3 col-md-6 col-sm-12 text-center">

                <div class="card tasks_report">

                    <div class="body"> <input type="text" class="knob dial3" value="{{ count($specialtys) }}" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#f9bd53" readonly>

                        <h6 class="m-t-20">Specialties</h6>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 text-center">

                <div class="card tasks_report">

                    <div class="body"> <input type="text" class="knob dial2" value="{{ count($rooms) }}" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#7b69ec" readonly>

                        <h6 class="m-t-20">Rooms</h6>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 text-center">

                <div class="card tasks_report">

                    <div class="body"> <input type="text" class="knob dial4" value="{{ count($companys) }}" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#00adef" readonly>

                        <h6 class="m-t-20">Companies</h6>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 text-center">

                <div class="card tasks_report">

                    <div class="body"> <input type="text" class="knob dial2" value="{{ count($users) }}" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#4CAF50" readonly>

                        <h6 class="m-t-20">Users</h6>

                    </div>

                </div>

            </div>

        </div>

        <div class="row clearfix">

            <div class="col-sm-12">

                <div class="card">

                    <div class="row clearfix">

                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">

                            <div class="body">

                                <h2 class="number count-to m-t-0" data-from="0" data-to="{{ count($appointments) }}" data-speed="2000" data-fresh-interval="700">{{ count($appointments) }}</h2>

                                <p class="text-muted ">Appointments</p>

                                <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">

                            <div class="body">

                                <h2 class="number count-to m-t-0" data-from="0" data-to="{{ count($patients) }}" data-speed="1000" data-fresh-interval="700">{{ count($patients) }}</h2>

                                <p class="text-muted">Satisfied Patient</p>

                                <span id="linecustom1">1,4,2,6,5,7,5,8,5,2</span>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">

                            <div class="body">

                                <h2 class="number count-to m-t-0" data-from="0" data-to="{{ count($doctors) }}" data-speed="2000" data-fresh-interval="700">{{ count($doctors) }}</h2>

                                <p class="text-muted">Doctors</p>

                                <span id="linecustom3">1,5,3,6,6,3,6,8,4,7</span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="card patients-list">

                    <div class="body">

                        @if (count($results) > 0)

                        <div class="table-responsive">

                            <table class="table m-b-0 table-hover">

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

                        </div>

                        @else <div class="alert alert-info">Empty data</div> @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection