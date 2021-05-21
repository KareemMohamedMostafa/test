<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;

use App\Room;

use App\Company;

class RoomController extends Controller
{

    public function index()
    {

        $result = Room::orderBy('name', 'asc')->paginate(1000);

        $companys = Company::orderBy('fullname', 'asc')->paginate(1000);

        return view('room.list', array('results' => $result, 'companys' => $companys));
    }

    public function view(int $id)
    {

        $room = Room::find($id);

        if (isset($room) && $room->id > 0) {

            $data = $room;

            $data['formatedcreated_at'] = \FormatTime::LongTimeFilter($room->created_at);
            $data['formatedupdated_at'] = \FormatTime::LongTimeFilter($room->updated_at);
            $data['username'] = $room->user->name;
            $data['usermodifiedname'] = $room->usermodified->name;
            $data['companyname'] = $room->company->name;

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

        $room = (isset($request->id) && $request->id > 0) ? Room::findOrFail($request->id) : new Room();

        $user = \Auth::user();
        $room->createdBy = $user->id;
        $room->modifiedby = $user->id;
        $room->companyid = $request->input('companyid');
        $room->name = $request->input('name');

        $room->id ? $room->update() : $room->save();

        return redirect()->route('rooms')->with(array('message' => 'Successfully saved'));
    }
}
