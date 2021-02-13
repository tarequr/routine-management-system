<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Time;
use Session;


class TimeController extends Controller
{
    public function view()
    {
    	$times     = Time::orderBy('id','asc')->get();
    	return view('admin.time.view-time',['times'=>$times]);
    }

    public function add()
    {
    	return view('admin.time.add-time');
    }

    public function store(Request $request)
    {
    	$time = new Time();

    	$time->time  = $request->time;
    	$time->save();

    	Session::flash('message','Time Save Successfully!');
    	return redirect()->route('times-view');
    }

    public function edit($id)
    {
        $editTime = Time::find($id);
        return view('admin.time.edit-time',['editTime'=>$editTime]);
    }

    public function update(Request $request)
    {
        $time = Time::find($request->id);

        $time->time  = $request->time;
        $time->save();

        Session::flash('message','Time Update Successfully!');
        return redirect()->route('times-view');
    }

    public function delete($id)
    {
    	$time = Time::find($id);
    	$time->delete();

    	Session::flash('message','Time Delete Successfully!');
    	return redirect()->route('times-view');
    }
}
