<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Communicate;
use Session;

class ContactController extends Controller
{

    public function viewCommunicate()
    {
        $communicates = Communicate::orderBy('id','desc')->get();

        return view('admin.contact.view-communicate',['communicates'=>$communicates]);
    }

    public function deleteCommunicate($id)
    {
        $communicate = Communicate::find($id);

        $communicate->delete();

        Session::flash('message','Communicate Delete Successfully!');
        return redirect()->route('contacts-communicate');
    }
}
