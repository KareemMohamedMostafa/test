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

use Carbon\Carbon;

class ReportController extends Controller
{

    public function index($days = 7)
    {
        $days = isset($days) ? intval($days) : 0;

        if ($days > 0) $result = Appointment::select('*')->where('start', '>=', Carbon::now()->subDay($days))->get();

        else $result =  Appointment::get();

        $rooms = room::orderBy('name', 'asc')->get();

        $doctors = Doctor::orderBy('fullname', 'asc')->get();

        $patients = Patient::orderBy('fullname', 'asc')->get();

        return view('report', array('results' => $result, 'rooms' => $rooms, 'doctors' => $doctors, 'patients' => $patients));
    }
}
