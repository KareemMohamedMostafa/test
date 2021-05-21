@extends('layouts.app')

@section('content')

<section class="content">

  <div class="block-header">

    <div class="row">

      <div class="col-lg-7 col-md-6 col-sm-12">

        <h2>All Patients <small class="text-muted">Listing</small> </h2>

      </div>

      <div class="col-lg-5 col-md-6 col-sm-12">

        @if (Auth::user()->role != 'visitor')

        <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button" data-toggle="modal" data-target="#formPatientModal" onclick="resetForm('patientForm')"> <i class="zmdi zmdi-plus"></i> </button>

        @endif

        <ul class="breadcrumb float-md-right">

          <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="zmdi zmdi-home"></i> Home</a></li>

          <li class="breadcrumb-item"><a href="javascript:void(0);">Patients</a></li>

          <li class="breadcrumb-item active">All</li>

        </ul>

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

              <table class="table m-b-0 table-hover js-basic-example dataTable">

                <thead>

                  <tr>

                    <th>Img</th>

                    <th>Name</th>

                    <th>Age</th>

                    <th>Email</th>

                    <th class="text-center">Phone</th>

                    <th class="text-center">Since</th>

                    <th class="text-center">Status</th>

                    @if (Auth::user()->role == 'admin')

                    <th class="text-center">Actions</th>

                    @endif

                  </tr>

                </thead>

                <tbody>

                  @foreach($results as $result)

                  <tr>

                    <td><span class="list-icon"><img class="patients-img" src="{{ url('/getImage/' . $result->image) }}" /></span></td>

                    <td>{{ $result->fullname }}</td>

                    <td>{{ \FormatTime::LongTimeFilter($result->birthdate) }}</td>

                    <td>{{ $result->email }}</td>

                    <td class="text-center">{{ \FormatTime::phoneFormat($result->phone) }}</td>

                    <td class="text-center">{{ \FormatTime::LongTimeFilter($result->created_at) }}</td>

                    <td class="text-center"><span class="badge badge-success">{{ $result->status }}</span></td>

                    @if (Auth::user()->role == 'admin')

                    <td class="text-center">

                      <button type="button" class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round" data-toggle="modal" data-target="#viewModal" onclick="viewPatientModal('{{ $result->id }}')"><i class="zmdi zmdi-account-o"></i></button>

                      <button type="button" class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round" data-toggle="modal" data-target="#formPatientModal" onclick="editPatientModal('{{ $result->id }}')"><i class="zmdi zmdi-edit"></i></button>

                    </td>

                    @endif

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

@include('patient.form')

@include('patient.view')

@endsection