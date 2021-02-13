<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Model\Routine;
use App\Model\Course;
use App\Model\Department;
use App\Model\Semester;
use App\Model\Section;
use App\Model\Day;
use App\Model\Room;
use App\Model\Time;
use App\Model\Batch;
use App\User;
use Session;
use DB;
use PDF;
use App;



class TeacherController extends Controller
{

    public function teacherMakeRoutine()  
    {

      $data['showRoutines'] = DB::table('routines')->where('teacherId', auth()->user()->id)

       ->join('users', 'users.id', '=', 'routines.teacherId')
       ->join('semesters', 'semesters.id', '=', 'routines.semesterId')
       ->join('batches', 'batches.id', '=', 'routines.batchId')
       ->join('courses', 'courses.id', '=', 'routines.courseId')
       ->join('sections', 'sections.id', '=', 'routines.sectionId')
       ->select('routines.*','users.name','semesters.semesterName','batches.batch','courses.courseTitle','courses.courseCode','courses.courseType','sections.sectionName')
       ->get();
                                  
        return view('admin.teacher.teacherMakeRoutine',$data);
    }

    public function editRoutine($id)
    {
      $data['editTeacherRoutine'] = Routine::find($id);

      $data['days']  = Day::all();
      $data['rooms'] = Room::where('rooms.deptId', auth()->user()->deptId)->get();;
      $data['times'] = Time::all();

      return view('admin.teacher.edit-teacherRoutine',$data);
    }


    public function updateDay1Routine(Request $request)
    {

      $routine = Routine::find($request->id);

      $assignedBatchId = $routine->batchId;

      $existingRoutine = Routine::where('dayId', $request->dayId)->where('timeId', $request->timeId)->where('roomId', $request->roomId)->first();      

      $existingSecondRoutine = Routine::where('dayTwoId', $request->dayId)->where('timeTwoId', $request->timeId)->where('roomTwoId', $request->roomId)->first();

      // its working for batch.
      $existingBatch = Routine::where('batchId', $assignedBatchId)->where('dayId', $request->dayId)->where('timeId', $request->timeId)->first();

      $existingSecondBatch = Routine::where('batchId', $assignedBatchId)->where('dayTwoId', $request->dayId)->where('timeTwoId', $request->timeId)->first();


      if(!$existingRoutine){

        if (!$existingSecondRoutine) {

          if (!$existingBatch) {

            if (!$existingSecondBatch) {

              if($request->has('day_one')){
                $routine->dayId   = $request->dayId;
                $routine->roomId  = $request->roomId;
                $routine->timeId  = $request->timeId; 

              }elseif($request->has('day_two')){
                $routine->dayTwoId   = $request->dayId;
                $routine->roomTwoId  = $request->roomId;
                $routine->timeTwoId  = $request->timeId;
              }
              $routine->save();

              Session::flash('message','Routine Updated Successfully!');
              return redirect()->back();
              
            }else{
              Session::flash('scheduleMessage','Batch Time Conflict!');
              return redirect()->back();
            }

          }else{
            Session::flash('scheduleMessage','Batch Time Conflict!');
            return redirect()->back();
          }
            
        }else{
          Session::flash('scheduleMessage','Please Try Different Schedule!');
          return redirect()->back();
        }
        
      }else{
        Session::flash('scheduleMessage','Please Try Different Schedule!');
        return redirect()->back();
      }

    }


    public function viewRoutine()
    {
     $pdf = App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convertDataToHtml());
     return $pdf->stream();
     return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }

    public function convertDataToHtml()
    {
      $showPdfRoutines = DB::table('routines')->where('teacherId', auth()->user()->id)
                    
                    ->join('users', 'users.id', '=', 'routines.teacherId')
                    ->join('batches', 'batches.id', '=', 'routines.batchId')
                    ->join('days', 'days.id', '=', 'routines.dayId')
                    ->join('courses', 'courses.id', '=', 'routines.courseId')
                    ->join('sections', 'sections.id', '=', 'routines.sectionId')
                    ->join('rooms', 'rooms.id', '=', 'routines.roomId')
                    ->join('times', 'times.id', '=', 'routines.timeId')
                    ->select('routines.*','users.name','batches.batch','courses.courseTitle','courses.courseCode','courses.courseType','days.dayOne','sections.sectionName','rooms.roomNo','times.time')
                    ->get();

      return view('admin.teacher.view-routine',compact('showPdfRoutines'));
    }


}

