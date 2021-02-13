<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Semester;
use Session;

class SemesterController extends Controller
{
    public function view()
    {
    	$countSemester = Semester::count();
    	$semesters     = Semester::all();
    	return view('admin.semester.view-semester',['semesters'=>$semesters],['countSemester'=>$countSemester]);
    }

    public function add()
    {
    	$countSemester = Semester::count();
    	return view('admin.semester.add-semester',['countSemester'=>$countSemester]);
    }

    public function store(Request $request)
    {
    	$semester = new Semester();

    	$semester->semesterName  = $request->semesterName;
    	$semester->save();

    	Session::flash('message','Semester Save Successfully!');
    	return redirect()->route('semesters-view');
    }

    public function edit($id)
    {
        $editSemester = Semester::find($id);
        return view('admin.semester.edit-semester',['editSemester'=>$editSemester]);
    }

    public function update(Request $request)
    {
        $semester = Semester::find($request->id);

        $semester->semesterName  = $request->semesterName;
        $semester->save();

        Session::flash('message','Semester Update Successfully!');
        return redirect()->route('semesters-view');
    }

    public function delete($id)
    {
    	$semester = Semester::find($id);
    	$semester->delete();

    	Session::flash('message','Semester Delete Successfully!');
    	return redirect()->route('semesters-view');
    }

}
