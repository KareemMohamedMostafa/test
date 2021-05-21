<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;

use App\Specialty;

use App\Company;

class SpecialtyController extends Controller
{

    public function index()
    {

        $result = Specialty::orderBy('name', 'asc')->paginate(1000);

        $companys = Company::orderBy('fullname', 'asc')->paginate(1000);

        return view('specialty.list', array('results' => $result, 'companys' => $companys));
    }

    public function view(int $id)
    {

        $specialty = Specialty::find($id);

        if (isset($specialty) && $specialty->id > 0) {

            $data = $specialty;

            $data['formatedcreated_at'] = \FormatTime::LongTimeFilter($specialty->created_at);
            $data['formatedupdated_at'] = \FormatTime::LongTimeFilter($specialty->updated_at);
            $data['username'] = $specialty->user->name;
            $data['usermodifiedname'] = $specialty->usermodified->name;
            $data['companyname'] = $specialty->company->name;

            return $data;
        }

        return array('message' => 'No data');
    }

    public function save(Request $request)
    {

        $validate = $this->validate($request, [
            'name' => 'required',
            'companyid' => 'required'
        ]);

        $specialty = (isset($request->id) && $request->id > 0) ? Specialty::findOrFail($request->id) : new Specialty();

        $user = \Auth::user();
        $specialty->createdBy = $user->id;
        $specialty->modifiedby = $user->id;
        $specialty->companyid = $request->input('companyid');
        $specialty->name = $request->input('name');

        $specialty->id ? $specialty->update() : $specialty->save();

        return redirect()->route('specialtys')->with(array('message' => 'Successfully saved'));
    }
}
