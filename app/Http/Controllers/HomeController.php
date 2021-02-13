<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Department;
use App\Model\Course;
use App\User;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.Logo::count();
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $data['countDept']    = Department::count();
        $data['countCourse']  = Course::count();
        $data['countUser']    = User::count();
        $data['pendingUser']  = User::where('publicationStatus',0)->count();
        $data['countAdmin']   = User::where('usertype','Admin')->count();
        $data['countTeacher'] = User::where('usertype','Teacher')->count();
        $data['countStudent'] = User::where('usertype','Student')->count();

        $data['users']       = DB::table('users')
                                 ->join('departments','users.deptId','=','departments.id')
                                 ->select('users.*','departments.deptName')
                                 ->get();

        return view('admin.home.homeContent',$data);
    }
}
