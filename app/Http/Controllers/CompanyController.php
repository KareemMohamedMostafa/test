<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;

use App\Company;

use App\Room;

use App\Specialty;

class CompanyController extends Controller
{

    public function index()
    {

        $result = Company::orderBy('fullname', 'asc')->paginate(1000);

        $colors = array('card xl-blue', 'card xl-khaki', 'card xl-blue', 'card xl-parpl', 'card xl-pink', 'card xl-seagreen', 'card xl-blue', 'card xl-seagreen');

        return view('company.list', array('results' => $result, 'colors' => $colors));
    }

    public function view(int $id)
    {

        $company = Company::find($id);

        if (isset($company) && $company->id > 0) {

            $data = $company;

            $data['formatedbirthdate'] = \FormatTime::LongTimeFilter($company->birthdate);
            $data['formatedphone'] = \FormatTime::phoneFormat($company->phone);
            $data['formatedcreated_at'] = \FormatTime::LongTimeFilter($company->created_at);
            $data['formatedupdated_at'] = \FormatTime::LongTimeFilter($company->updated_at);
            $data['image'] = url('/getImage/' . $company->image);
            $data['username'] = $company->user->name;
            $data['usermodifiedname'] = $company->usermodified->name;

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
            'specialty' => 'required'
        ]);

        $company = (isset($request->id) && $request->id > 0) ? Company::findOrFail($request->id) : new Company();

        $user = \Auth::user();
        $company->createdBy = $user->id;
        $company->modifiedby = $user->id;
        $company->specialty = $request->input('specialty');
        $company->fullname = $request->input('fullname');
        $company->birthdate = $request->input('birthdate');
        $company->website = $request->input('website');
        $company->facebook = $request->input('facebook');
        $company->twitter = $request->input('twitter');
        $company->instagram = $request->input('instagram');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->address = $request->input('address');

        $image = $request->file('image');
        if ($image) {
            $company->image = $request->input('image');
            $image_path = time() . $image->getClientOriginalName();
            \Storage::disk('images')->delete($company->image);
            \Storage::disk('images')->put($image_path, \File::get($image));

            $company->image = $image_path;
        }

        $company->id ? $company->update() : $company->save();

        return redirect()->route('companys')->with(array('message' => 'Successfully saved'));
    }
}
