<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Department;
use App\Model\Course;
use App\User;
use Session;
use DB;
use Mail;

class UserController extends Controller
{
    public function viewUsers()
    {
        $users = DB::table('users')
                 ->orderBy('id', 'desc')
                 ->join('departments','users.deptId','=','departments.id')
                 ->select('users.*','departments.deptName')
                 ->get();

    	return view('admin.user.view-user',['users'=>$users]);
    }

    public function addUsers()
    {
        $departments = Department::where('publicationStatus',1)->get();
    	return view('admin.user.add-user',['departments'=>$departments]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'usertype'          => 'required',
    		'deptId'            => 'required',
    		'name'              => 'required',
    		'email'             => 'required|unique:users',
    		'password'          => 'required|min:6',
    		'confirmPassword'   => 'required_with:password|same:password|min:6',
            'publicationStatus' => 'required',
    	]);

    	$user = new User();

    	$user->usertype = $request->usertype;
        $user->deptId   = $request->deptId;
    	$user->name 	= $request->name;
    	$user->email 	= $request->email;
    	$user->password = bcrypt($request->password);
        $user->publicationStatus = $request->publicationStatus;

    	$user->save();

        $data = array(
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name
        );

        Mail::send('admin.email.show-information', $data, function ($message) use ($data) {
            $message->from(env('MAIL_USERNAME'), 'Routine Management System');
            $message->to($data['email']);
            $message->subject('Welcome to Routine Management System');
        });


    	Session::flash('message','User Save Successfully!');
    	return redirect()->route('users-view');
    }

    public function edit($id)
    {
        $departments = Department::where('publicationStatus',1)->get();
    	$editUser = User::find($id);
    	return view('admin.user.edit-user',['editUser'=>$editUser],['departments'=>$departments]);
    }

    public function update(Request $request,$id)
    {
    	$user = User::find($id);
        $this->validate($request,[
            'usertype'          => 'required',
            'deptId'            => 'required',
            'name'              => 'required',
            'email'             => 'required|unique:users,email,'.$user->id,
            'publicationStatus' => 'required',
        ]);

    	$user->usertype = $request->usertype;
        $user->deptId   = $request->deptId;
    	$user->name 	= $request->name;
    	$user->email 	= $request->email;
        $user->publicationStatus = $request->publicationStatus;
    	$user->save();

    	Session::flash('message','User Update Successfully!');
    	return redirect()->route('users-view');
    }


    public function inactiveUser($id)
    {
        $user = User::find($id);
        $user->publicationStatus = 0;
        $user->save();

        Session::flash('message','User Inactive Successfully!');
        return back();
    }

    public function activeUser($id)
    {
        $user = User::find($id);
        $user->publicationStatus = 1;
        $user->save();

        Session::flash('message','User Active Successfully!');
        return back();
    }

    public function delete($id)
    {
    	$user = User::find($id);

    	if (file_exists('public/upload/user_images/' . $user->image) AND ! empty($user->image)) {
    		unlink('public/upload/user_images/' . $user->image);
    	}

    	$user->delete();

    	Session::flash('message','User Delete Successfully!');
    	return redirect()->route('users-view');
    }



    public function adminDetails()
    {
        $data['countDept']   = Department::count();
        $data['countCourse'] = Course::count();
        $data['countUser']   = User::count();
        $data['users']       = DB::table('users')
                                 ->orderBy('id','desc')
                                 ->join('departments','users.deptId','=','departments.id')
                                 ->select('users.*','departments.deptName')
                                 ->get();

        return view('admin.admin.admin-details',$data);
    }

    public function teacherDetails()
    {
        $data['countDept']   = Department::count();
        $data['countCourse'] = Course::count();
        $data['countUser']   = User::count();
        $data['users']       = DB::table('users')
                                 ->orderBy('id','desc')
                                 ->join('departments','users.deptId','=','departments.id')
                                 ->select('users.*','departments.deptName')
                                 ->get();

        return view('admin.teacher.teacher-details',$data);
    }



}
