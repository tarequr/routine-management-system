<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Routine;
use App\Model\Course;
use App\Model\Department;
use App\Model\Semester;
use App\Model\Section;
use App\Model\Day;
use App\Model\Room;
use App\Model\Time;
use App\User;
use Session;
use DB;
use PDF;
use App;



class StudentController extends Controller
{
	public function studentDetails()
	{
		$data['countDept']   = Department::count();
        $data['countCourse'] = Course::count();
        $data['countUser']   = User::count();
        $data['users']       = DB::table('users')
                                 ->orderBy('id','desc')
                                 ->join('departments','users.deptId','=','departments.id')
                                 ->select('users.*','departments.deptName')
                                 ->get();

        return view('admin.student.student-details',$data);
	}


    //routine part
    public function viewRoutine()
    {
     $pdf = App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convertDataToHtml());
     return $pdf->stream();
     return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }

    public function convertDataToHtml()
    {
      $studentPdfRoutines = DB::table('routines')->where('users.deptId', auth()->user()->deptId)                 
                    ->join('users', 'users.id', '=', 'routines.teacherId')
                    ->join('batches', 'batches.id', '=', 'routines.batchId')
                    ->join('days', 'days.id', '=', 'routines.dayId')
                    ->join('courses', 'courses.id', '=', 'routines.courseId')
                    ->join('sections', 'sections.id', '=', 'routines.sectionId')
                    ->join('rooms', 'rooms.id', '=', 'routines.roomId')
                    ->join('times', 'times.id', '=', 'routines.timeId')
                    ->select('routines.*','users.name','batches.batch','courses.courseTitle','courses.courseCode','courses.courseType','days.dayOne','sections.sectionName','rooms.roomNo','times.time')
                    ->get();
      return view('admin.student.view-routine',compact('studentPdfRoutines'));
    }

}
