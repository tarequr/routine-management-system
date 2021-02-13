<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Logo;
use Session;

class LogoController extends Controller
{
    public function view()
    {
        //logo to aktir besi hote pare na ...tai ai logo count use kora hoyese
        $countLogo = Logo::count();

    	$logos = Logo::all();
    	return view('admin.logo.view-logo',['logos'=>$logos],['countLogo'=>$countLogo]);
    }

    public function add()
    {
        //logo jodi akta theke thake taile logo add kora jabe na...tai ai logo count use kora hoyese
        $countLogo = Logo::count();

    	return view('admin.logo.add-logo',['countLogo'=>$countLogo]);
    }

    public function store(Request $request)
    {
    	$logo = new Logo();

    	$logo->createdBy = Auth::user()->id;
    	//image section Start
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/logo_images'),$filename);
    		$logo['image'] = $filename;
    	}
    	//image section End

    	$logo->save();

    	Session::flash('message','Logo Save Successfully!');
    	return redirect()->route('logos-view');
    }

    public function edit($id)
    {
    	$editLogo = Logo::find($id);
    	return view('admin.logo.edit-logo',['editLogo'=>$editLogo]);
    }

    public function update(Request $request)
    {
    	$logo = Logo::find($request->id);

    	$logo->updatedBy = Auth::user()->id;
    	//image section Start
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/logo_images/'.$logo->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/logo_images'),$filename);
    		$logo['image'] = $filename;
    	}
    	//image section End

    	$logo->save();

    	Session::flash('message','Logo Update Successfully!');
    	return redirect()->route('logos-view');
    }

    public function delete($id)
    {
    	$logo = Logo::find($id);

    	if (file_exists('public/upload/logo_images/' . $logo->image) AND ! empty($logo->image)) {
    		unlink('public/upload/logo_images/' . $logo->image);
    	}

    	$logo->delete();

    	Session::flash('message','logo Delete Successfully!');
    	return redirect()->route('logos-view');
    }
}
