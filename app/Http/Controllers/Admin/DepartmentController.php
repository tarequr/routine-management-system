<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Department;
use Session;


class DepartmentController extends Controller
{
    public function add()
    {
    	return view('admin.department.add-department');
    }

    public function store(Request $request)
    {
    	$department = new Department();

    	$department->deptName          = $request->deptName;
    	$department->deptDescription   = $request->deptDescription;
    	$department->publicationStatus = $request->publicationStatus;

    	$department->save();

    	Session::flash('message','Department Save Successfully!');
    	return redirect()->route('departments-view');
    }

	public function view()
    {
    	$departments = Department::all();
    	return view('admin.department.view-department',['departments'=>$departments]);
    }

    public function inactiveDept($id)
    {
        $department = Department::find($id);
        $department->publicationStatus = 0;
        $department->save();

        Session::flash('message','Department Inactive Successfully!');
        return back();
    }

    public function activeDept($id)
    {
        $department = Department::find($id);
        $department->publicationStatus = 1;
        $department->save();

        Session::flash('message','Department Active Successfully!');
        return back();
    }


    public function edit($id)
    {
    	$editdepartment = Department::find($id);
    	return view('admin.department.edit-department',['editdepartment'=>$editdepartment]);
    }

    public function update(Request $request)
    {
    	$department = Department::find($request->id);

    	$department->deptName          = $request->deptName;
    	$department->deptDescription   = $request->deptDescription;
    	$department->publicationStatus = $request->publicationStatus;

    	$department->save();

    	Session::flash('message','department Update Successfully!');
    	return redirect()->route('departments-view');
    }

    public function delete($id)
    {
    	$department = Department::find($id);
    	$department->delete();

    	Session::flash('message','department Delete Successfully!');
    	return redirect()->route('departments-view');
    }
}
