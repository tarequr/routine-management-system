<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;
use App\Model\Department;
use App\Model\logo;
use App\Model\Communicate;
use Session;

class WelcomeController extends Controller 
{
    public function index()
    {
    	$data['sliders']     = Slider::all();
    	$data['departments'] = Department::all();
    	$data['logo']        = Logo::first();

    	return view('frontend.home.homeContent',$data);
    }

    public function aboutUs()
    {
    	$data['logo']        = Logo::first();
        $data['sliders']     = Slider::all();

    	return view('frontEnd.singlePage.about-us',$data);
    }

    public function contactUs()
    {
        $data['logo']        = Logo::first();
        $data['sliders']     = Slider::all();
        
    	return view('frontEnd.singlePage.contact-us',$data);
    }
    public function store(Request $request)
    {
       $communicates = new Communicate();

       $communicates->name    = $request->name;
       $communicates->email   = $request->email;
       $communicates->phone   = $request->phone;
       $communicates->address = $request->address;
       $communicates->msg     = $request->msg;

       $communicates->save();

       Session::flash('success','Your message send successfully!');
        return redirect()->back();
    }

}
