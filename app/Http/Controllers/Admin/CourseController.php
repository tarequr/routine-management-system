<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Course;
use App\Model\Department;
use App\Model\Semester;
use App\User;
use Session;
use DB;



class CourseController extends Controller
{
    public function add()
    {
    	$data['users']       = User::where('publicationStatus',1)->get();
		$data['semesters']   = Semester::all();
    	$data['departments'] = Department::where('publicationStatus',1)->get();

    	return view('admin.course.add-course',$data);
    	
    }

    public function store(Request $request)
    {
    	$course = new Course();

    	$course->courseTitle       = $request->courseTitle;
    	$course->courseCode        = $request->courseCode;
    	$course->courseType        = $request->courseType;
    	$course->deptId            = $request->deptId;
    	$course->semesterId        = $request->semesterId;
    	$course->publicationStatus = $request->publicationStatus;

    	$course->save();

    	Session::flash('message','Course Save Successfully!');
    	return redirect()->route('courses-view');
    }

	public function view()
    {
    	$courses = Course::orderBy('id','desc')->get();

    	return view('admin.course.view-course',['courses'=>$courses]);
    }

    public function inactiveCourse($id)
    {
        $course = Course::find($id);
        $course->publicationStatus = 0;
        $course->save();

        Session::flash('message','Course Inactive Successfully!');
        return back();
    }

    public function activeCourse($id)
    {
        $course = Course::find($id);
        $course->publicationStatus = 1;
        $course->save();

        Session::flash('message','Course Active Successfully!');
        return back();
    }


    public function edit($id)
    {

    	$data['semesters']   = Semester::all();
    	$data['departments'] = Department::where('publicationStatus',1)->get();
    	$data['editCourse']  = Course::find($id);
        

    	return view('admin.course.edit-course',$data);
    }

    public function update(Request $request)
    {
    	$course = Course::find($request->id);

    	$course->courseTitle       = $request->courseTitle;
    	$course->courseCode        = $request->courseCode;
    	$course->courseType        = $request->courseType;
    	$course->deptId            = $request->deptId;
    	$course->semesterId        = $request->semesterId;
    	$course->publicationStatus = $request->publicationStatus;

    	$course->save();

    	Session::flash('message','Course Update Successfully!');
    	return redirect()->route('courses-view');
    }

    public function delete($id)
    {
    	$course = Course::find($id);
    	$course->delete();

    	Session::flash('message','Course Delete Successfully!');
    	return redirect()->route('courses-view');
    }
}
