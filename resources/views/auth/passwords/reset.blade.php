@extends('layouts.login')

@section('content')
<form class="form" role="form" method="post" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}


    <div class="content">

        <div class="input-group input-lg">

            <input type="hidden" name="token" value="{{ $token }}">

            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

        </div>

        <div class="input-group input-lg">

            <input type="password" name="password" placeholder="Password" class="form-control" />

            <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>

        </div>

        <div class="input-group input-lg">

            <input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control" />

            <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>

        </div>

    </div>

    <div class="footer text-center">

        <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light"> <i class="fa fa-btn fa-sign-in"></i> Register </button>

        <a href="{{ url('/login') }}" class="link">

            <span class="m-t-20">Have account?</span>

        </a>

        |

        <a href="{{ url('/register') }}" class="link">

            <span class="m-t-20">New patient!</span>

        </a>

    </div>

</form>

@endsection