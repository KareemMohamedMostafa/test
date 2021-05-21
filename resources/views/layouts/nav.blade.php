<nav class="navbar">

    <div class="col-12">

        <div class="navbar-header text-center"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="{{ url('/') }} "><img src="favicon.png" width="30" /><span class="m-l-10">System</span></a> </div>

        <ul class="nav navbar-nav navbar-left">

            <li> <a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a> </li>

        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li><a href="{{ url('appointments/7') }}"><i class="zmdi zmdi-calendar"></i></a></li>

            <li><a href="{{ route('doctors') }}"><i class="zmdi zmdi-account-box-phone"></i></a></li>

            <li><a href="{{ route('patients') }}"><i class="zmdi zmdi-account-o"></i></a></li>

            <li><a href="{{ route('users') }}"><i class="zmdi zmdi-account-box-phone"></i></a></li>

            <li><a href="{{ url('/') }}"><i class="zmdi zmdi-home"></i></a></li>

            <li> <a href="{{ url('/logout') }}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a> </li>

        </ul>

    </div>

</nav>