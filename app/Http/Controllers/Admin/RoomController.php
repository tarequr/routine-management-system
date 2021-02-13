<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Department;
use App\Model\Room;
use Session;
use DB;


class RoomController extends Controller
{
    public function add()
    {
    	$departments = Department::where('publicationStatus',1)->get();
    	return view('admin.room.add-room',['departments'=>$departments]);
    }

    public function store(Request $request)
    {
    	$room = new Room();

    	$room->roomNo            = $request->roomNo;
    	$room->roomType          = $request->roomType;
    	$room->deptId            = $request->deptId;
    	$room->publicationStatus = $request->publicationStatus;

    	$room->save();

    	Session::flash('message','Room Save Successfully!');
    	return redirect()->route('rooms-view');
    }

	public function view()
    {
    	$rooms = DB::table('rooms')->orderBy('id','desc')
    			 ->join('departments','rooms.deptId','=','departments.id')
    			 ->select('rooms.*','departments.deptName')
    			 ->get();

    	return view('admin.room.view-room',['rooms'=>$rooms]);
    }


    public function inactiveRoom($id)
    {
        $room = Room::find($id);
        $room->publicationStatus = 0;
        $room->save();

        Session::flash('message','Room Inactive Successfully!');
        return back();
    }

    public function activeRoom($id)
    {
        $room = Room::find($id);
        $room->publicationStatus = 1;
        $room->save();

        Session::flash('message','Room Active Successfully!');
        return back();
    }


    public function edit($id)
    {
    	$departments = Department::where('publicationStatus',1)->get();
    	$editroom = Room::find($id);
    	return view('admin.room.edit-room',['editroom'=>$editroom],['departments'=>$departments]);
    }

    public function update(Request $request)
    {
    	$room = Room::find($request->id);

    	$room->roomNo            = $request->roomNo;
    	$room->roomType          = $request->roomType;
    	$room->deptId            = $request->deptId;
    	$room->publicationStatus = $request->publicationStatus;

    	$room->save();

    	Session::flash('message','Room Update Successfully!');
    	return redirect()->route('rooms-view');
    }

    public function delete($id)
    {
    	$room = Room::find($id);
    	$room->delete();

    	Session::flash('message','Room Delete Successfully!');
    	return redirect()->route('rooms-view');
    }
}
