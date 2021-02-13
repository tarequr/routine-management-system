<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Section;
use Session;


class SectionController extends Controller
{
    public function view()
    {
    	$countSection  = Section::count();
    	$sections      = Section::all();
    	return view('admin.section.view-section',['sections'=>$sections],['countSection'=>$countSection]);
    }

    public function add()
    {
    	$countSection = Section::count();
    	return view('admin.section.add-section',['countSection'=>$countSection]);
    }

    public function store(Request $request)
    {
    	$section = new Section();

    	$section->sectionName  = $request->sectionName;
    	$section->save();

    	Session::flash('message','Section Save Successfully!');
    	return redirect()->route('sections-view');
    }
    
    public function edit($id)
    {
        $editSection = Section::find($id);
        return view('admin.section.edit-section',['editSection'=>$editSection]);
    }

    public function update(Request $request)
    {
        $section = Section::find($request->id);

        $section->sectionName  = $request->sectionName;
        $section->save();

        Session::flash('message','Section Update Successfully!');
        return redirect()->route('sections-view');
    }

    public function delete($id)
    {
    	$section = Section::find($id);
    	$section->delete();

    	Session::flash('message','Section Delete Successfully!');
    	return redirect()->route('sections-view');
    }

}
