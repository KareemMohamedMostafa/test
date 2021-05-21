<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;

use App\Appointment;

use App\Room;

use App\Doctor;

use App\Patient;

use App\Specialty;

use App\User;

use App\Company;

use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index($days = 7)
    {

        $users = User::orderBy('email', 'asc')->get();

        $companys = Company::orderBy('id', 'desc')->get();

        $rooms = room::orderBy('name', 'asc')->get();

        $specialtys = Specialty::orderBy('name', 'asc')->get();

        $doctors = Doctor::orderBy('fullname', 'asc')->get();

        $patients = Patient::orderBy('fullname', 'asc')->get();

        $appointments = Appointment::orderBy('id', 'desc')->get();

        $results = Appointment::orderBy('id', 'desc')->paginate(10);

        return view('dashboard', array(

            'users' => $users,

            'companys' => $companys,

            'rooms' => $rooms,

            'specialtys' => $specialtys,

            'doctors' => $doctors,

            'patients' => $patients,

            'appointments' => $appointments,

            'results' => $results,

        ));
    }
}
