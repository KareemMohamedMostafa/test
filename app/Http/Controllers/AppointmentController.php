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

class AppointmentController extends Controller
{

    public function index($days = 7)
    {
        $days = isset($days) ? intval($days) : 0;

        if ($days > 0) $result = Appointment::select('*')->where('start', '>=', Carbon::now()->subDay($days))->get();

        else $result =  Appointment::get();

        $rooms = room::orderBy('name', 'asc')->get();

        $doctors = Doctor::orderBy('fullname', 'asc')->get();

        $patients = Patient::orderBy('fullname', 'asc')->get();

        return view('appointment.list', array('results' => $result, 'rooms' => $rooms, 'doctors' => $doctors, 'patients' => $patients));
    }

    public function view(int $id)
    {

        $appointment = Appointment::find($id);

        if (isset($appointment) && $appointment->id > 0) {

            $data = $appointment;

            $data['formatedstart'] = \FormatTime::MediumTimeFilter($data->start);

            $data['formatedfinish'] = \FormatTime::MediumTimeFilter($data->finish);

            return $data;
        }

        return array('message' => 'No data');
    }

    public function save(Request $request)
    {

        $validate = $this->validate($request, [
            'roomid' => 'required',
            'doctorid' => 'required',
            'patientid' => 'required',
            'subject' => 'required'
        ]);

        $appointment = (isset($request->id) && $request->id > 0) ? Appointment::findOrFail($request->id) : new Appointment();

        $user = \Auth::user();
        $appointment->createdBy = $user->id;
        $appointment->modifiedby = $user->id;
        $appointment->roomid = $request->input('roomid');
        $appointment->doctorid = $request->input('doctorid');
        $appointment->patientid = $request->input('patientid');
        $appointment->subject = $request->input('subject');
        $appointment->notes = $request->input('notes');
        $appointment->start = $request->input('start');
        $appointment->finish = $request->input('finish');

        $appointment->id ? $appointment->update() : $appointment->save();

        return redirect()->route('appointments')->with(array('message' => 'Successfully saved'));
    }
}
