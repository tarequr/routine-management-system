<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Day;
use Session;


class DayController extends Controller
{
    public function view()
    {
    	$countDay = Day::count();
    	$days     = Day::all();
    	return view('admin.day.view-day',['days'=>$days],['countDay'=>$countDay]);
    }

    public function add()
    {
    	$countDay = Day::count();
    	return view('admin.day.add-day',['countDay'=>$countDay]);
    }

    public function store(Request $request)
    {
    	$day = new Day();

    	$day->dayOne  = $request->dayOne;
    	$day->save();

    	Session::flash('message','Day Save Successfully!');
    	return redirect()->route('days-view');
    }

    public function edit($id)
    {
        $editday = Day::find($id);
        return view('admin.day.edit-day',['editday'=>$editday]);
    }

    public function update(Request $request)
    {
        $day = Day::find($request->id);

        $day->dayOne  = $request->dayOne;
        $day->save();

        Session::flash('message','Day Update Successfully!');
        return redirect()->route('days-view');
    }

    public function delete($id)
    {
    	$day = Day::find($id);
    	$day->delete();

    	Session::flash('message','Day Delete Successfully!');
    	return redirect()->route('days-view');
    }
}
