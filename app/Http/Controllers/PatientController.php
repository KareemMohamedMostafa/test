<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;

use App\Patient;

use App\Doctor;

class PatientController extends Controller
{

    public function index()
    {

        $result = Patient::orderBy('fullname', 'asc')->get();

        $doctors = Doctor::orderBy('fullname', 'asc')->get();

        return view('patient.list', array('results' => $result, 'doctors' => $doctors));
    }

    public function view(int $id)
    {

        $patient = Patient::find($id);

        if (isset($patient) && $patient->id > 0) {

            $data = $patient;

            $data['formatedgender'] = ($patient->gender == 'M') ? 'Male' : 'Female';
            $data['formatedbirthdate'] = \FormatTime::LongTimeFilter($patient->birthdate);
            $data['formatedphone'] = \FormatTime::phoneFormat($patient->phone);
            $data['formatedcreated_at'] = \FormatTime::LongTimeFilter($patient->created_at);
            $data['formatedupdated_at'] = \FormatTime::LongTimeFilter($patient->updated_at);
            $data['image'] = url('/getImage/' . $patient->image);
            $data['username'] = $patient->user->name;
            $data['usermodifiedname'] = $patient->usermodified->name;
            $data['doctorfullname'] = $patient->doctor->fullname;

            return $data;
        }

        return array('message' => 'No data');
    }

    public function save(Request $request)
    {

        $validate = $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'doctorid' => 'required'
        ]);

        $patient = (isset($request->id) && $request->id > 0) ? Patient::findOrFail($request->id) : new Patient();

        $user = \Auth::user();
        $patient->createdBy = $user->id;
        $patient->modifiedby = $user->id;
        $patient->doctorid = $request->input('doctorid');
        $patient->fullname = $request->input('fullname');
        $patient->gender = $request->input('gender');
        $patient->birthdate = $request->input('birthdate');
        $patient->height = $request->input('height');
        $patient->weight = $request->input('weight');
        $patient->bmi = $request->input('bmi');
        $patient->email = $request->input('email');
        $patient->phone = $request->input('phone');
        $patient->address = $request->input('address');

        $image = $request->file('image');
        if ($image) {
            $patient->image = $request->input('image');
            $image_path = time() . $image->getClientOriginalName();
            \Storage::disk('images')->delete($patient->image);
            \Storage::disk('images')->put($image_path, \File::get($image));

            $patient->image = $image_path;
        }

        $patient->id ? $patient->update() : $patient->save();

        return redirect()->route('patients')->with(array('message' => 'Successfully saved'));
    }
}
