@extends('layouts.login')

@section('content')

<form class="form" role="form" method="post" action="{{ url('/login') }}">

    {{ csrf_field() }}

    <div class="content">

        <div class="input-group input-lg">

            <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}" required>

            <span class="input-group-addon"> <i class="zmdi zmdi-account-circle"></i> </span>

        </div>

        <div class="input-group input-lg">

            <input type="password" name="password" placeholder="Password" class="form-control" />

            <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>

        </div>

    </div>

    <div class="footer text-center"> <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light"> <i class="fa fa-btn fa-sign-in"></i> Login </button> </div>

</form>

@endsection