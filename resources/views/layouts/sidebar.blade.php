<aside id="leftsidebar" class="sidebar">

  <div class="menu">

    <ul class="list">

      <li>

        <div class="user-info">

          <div class="image">

            <img src="{{ url('/getImage/' . Auth::user()->image) }}" />

          </div>

          <div class="detail">

            <small>{{ Auth::user()->role }}</small>

            <h4>{{ Auth::user()->name }}</h4>

          </div>

        </div>

      </li>

      <li class="header">MAIN</li>

      <li> <a href="{{ url('/') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

      <li> <a href="{{ url('appointments/7') }}"><i class="zmdi zmdi-copy"></i><span>Book Appointments</span></a> </li>

      <li class="header">ADMIN</li>

      <li> <a href="{{ route('doctors') }}"><i class="zmdi zmdi-accounts-list"></i><span>All Doctors</span></a> </li>

      <li> <a href="{{ route('patients') }}"><i class="zmdi zmdi-face"></i><span>All Patients</span></a> </li>

      <li> <a href="{{ url('reports/30') }}"><i class="zmdi zmdi-lock"></i><span>Report</span></a> </li>

      <li class="header">SETTINGS</li>

      <li> <a href="{{ route('rooms') }}"><i class="zmdi zmdi-labels"></i><span>Rooms</span></a> </li>

      <li> <a href="{{ route('specialtys') }}"><i class="zmdi zmdi-puzzle-piece"></i><span>Specialties</span></a> </li>

      <li> <a href="{{ route('companys') }}"><i class="zmdi zmdi-lock"></i><span>Companies</span></a> </li>

      <li> <a href="{{ route('users') }}"><i class="zmdi zmdi-accounts"></i><span>Users</span></a> </li>

    </ul>

  </div>

</aside>