@extends('layouts.app')

@section('content')

<section class="content">

  <div class="block-header">

    <div class="row">

      <div class="col-lg-7 col-md-6 col-sm-12">

        <h2>All Doctors <small class="text-muted">Listing</small> </h2>

      </div>

      <div class="col-lg-5 col-md-6 col-sm-12">

        @if (Auth::user()->role != 'visitor')

        <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button" data-toggle="modal" data-target="#formDoctorModal" onclick="resetForm('doctorForm')"> <i class="zmdi zmdi-plus"></i> </button>

        @endif

        <ul class="breadcrumb float-md-right">

          <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="zmdi zmdi-home"></i> Home</a></li>

          <li class="breadcrumb-item"><a href="javascript:void(0);">Doctors</a></li>

          <li class="breadcrumb-item active">All</li>

        </ul>

      </div>

    </div>

  </div>

  <div class="container-fluid">

    <div class="row clearfix">

      @if (count($results) > 0)

      @foreach($results as $result)

      <div class="col-lg-3 col-md-4 col-sm-6">

        <div class="{{ $colors[random_int(0, 7)] }} member-card doctor">

          <div class="body">

            <div class="member-thumb"> <img src="{{ url('/getImage/' . $result->image) }}" class="rounded-circle img-fluid img-thumbnail" alt="profile-image"> </div>

            <div class="detail">

              <h4 class="m-b-0">{{ $result->fullname }}</h4>

              <p class="text-muted">{{ $result->specialty->name }}</p>

              <ul class="social-links list-inline m-t-20">

                <li><a title="facebook" href="{{ $result->facebook }}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>

                <li><a title="twitter" href="{{ $result->twitter }}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>

                <li><a title="instagram" href="{{ $result->instagram }}" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>

              </ul>

              <p class="text-muted">{{ \FormatTime::LongTimeFilter($result->birthdate) }}</p>

              <p class="text-muted">{{ $result->email }}</p>

              <p class="text-muted">{{ \FormatTime::phoneFormat($result->phone) }}</p>

              <p class="text-muted">{{ $result->address }}</p>

              @if (Auth::user()->role == 'admin')

              <button type="button" data-toggle="modal" data-target="#formDoctorModal" onclick="editDoctorModal('{{ $result->id }}')" class="btn btn-default btn-round btn-simple"><i class="zmdi zmdi-edit"></i> Edit</button>

              @endif

            </div>

          </div>

        </div>

      </div>

      @endforeach

      @else <div class="alert alert-info">Empty data</div> @endif

    </div>

  </div>

</section>

@include('doctor.form')

@endsection