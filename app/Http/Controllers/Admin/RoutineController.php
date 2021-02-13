<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Routine;
use App\Model\Course;
use App\Model\Department;
use App\Model\Batch;
use App\Model\Semester;
use App\Model\Section;
use App\User;
use Session;
use DB;


class RoutineController extends Controller
{
    public function add()
    {

    	$data['users']       = User::where('publicationStatus',1)->where('usertype', 'Teacher')->where('deptId', auth()->user()->deptId)->get();
        $data['departments'] = Department::where('publicationStatus',1)->where('departments.id', auth()->user()->deptId)->get();
    	$data['courses']     = Course::where('publicationStatus',1)->where('deptId', auth()->user()->deptId)->get();
        $data['batchs']      = Batch::where('status',1)->where('deptId', auth()->user()->deptId)->get();
        $data['semesters']   = Semester::all();
        $data['sections']    = Section::all();

    	return view('admin.routine.add-routine',$data);
    	
    }

    public function store(Request $request)
    {
    	$routine = new Routine();

    	$routine->deptId     = $request->deptId;
    	$routine->semesterId = $request->semesterId;
        $routine->teacherId  = $request->teacherId;
    	$routine->batchId    = $request->batchId;
    	$routine->courseId   = $request->courseId;
    	$routine->sectionId  = $request->sectionId;
    	$routine->save();

    	Session::flash('message','Assign Teacher Successfully!');
    	return redirect()->route('routines-view');
    }

	public function view()
    {
    	$routines = DB::table('routines')->where('routines.deptId', auth()->user()->deptId)
           ->orderBy('id', 'desc')
           ->join('users', 'users.id', '=', 'routines.teacherId')
           ->join('semesters', 'semesters.id', '=', 'routines.semesterId')
           ->join('batches', 'batches.id', '=', 'routines.batchId')
           ->join('courses', 'courses.id', '=', 'routines.courseId')
           ->join('sections', 'sections.id', '=', 'routines.sectionId')
           ->select('routines.*','users.name','semesters.semesterName','batches.batch','courses.courseTitle','sections.sectionName')
           ->get();

    	return view('admin.routine.view-routine',['routines'=>$routines]);
    }

    public function edit($id)
    {
    	$data['users']       = User::where('publicationStatus',1)->where('usertype', 'Teacher')->where('deptId', auth()->user()->deptId)->get();
    	$data['departments'] = Department::where('publicationStatus',1)->get();
        $data['courses']     = Course::where('publicationStatus',1)->where('deptId', auth()->user()->deptId)->get();
    	$data['batchs']      = Batch::where('status',1)->where('deptId', auth()->user()->deptId)->get();
    	$data['semesters']   = Semester::all();
    	$data['sections']    = Section::all();
    	$data['editRoutine'] = Routine::find($id);

    	return view('admin.routine.edit-routine',$data);
    }

    public function update(Request $request)
    {
    	$routine = Routine::find($request->id);

    	$routine->deptId     = $request->deptId;
        $routine->semesterId = $request->semesterId;
        $routine->teacherId  = $request->teacherId;
        $routine->batchId    = $request->batchId;
        $routine->courseId   = $request->courseId;
        $routine->sectionId  = $request->sectionId;
        $routine->save();

    	Session::flash('message','Assign Teacher Update Successfully!');
    	return redirect()->route('routines-view');
    }

    public function delete($id)
    {
    	$routine = Routine::find($id);
    	$routine->delete();

    	Session::flash('message','Routine Delete Successfully!');
    	return redirect()->route('routines-view');
    }
}
