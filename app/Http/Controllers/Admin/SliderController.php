<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Slider;
use Session;

class SliderController extends Controller
{
    public function view()
    {
    	$sliders = Slider::all();
    	return view('admin.slider.view-slider',['sliders'=>$sliders]);
    }

    public function add()
    {
    	return view('admin.slider.add-slider');
    }


    public function store(Request $request)
    {
    	$slider = new Slider();

    	$slider->shortTitle = $request->shortTitle;
    	$slider->longTitle  = $request->longTitle;

    	$slider->createdBy  = Auth::user()->id;

    	//image section Start
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/slider_images'),$filename);
    		$slider['image'] = $filename;
    	}
    	//image section End

    	$slider->save();

    	Session::flash('message','Slider Save Successfully!');
    	return redirect()->route('sliders-view');
    }

    public function edit($id)
    {
    	$editSlider = Slider::find($id);
    	return view('admin.slider.edit-slider',['editSlider'=>$editSlider]);
    }


    public function update(Request $request)
    {
    	$slider = Slider::find($request->id);

    	$slider->shortTitle = $request->shortTitle;
    	$slider->longTitle  = $request->longTitle;

    	$slider->updatedBy = Auth::user()->id;
    	//image section Start
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/slider_images/'.$slider->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/slider_images'),$filename);
    		$slider['image'] = $filename;
    	}
    	//image section End

    	$slider->save();

    	Session::flash('message','Slider Update Successfully!');
    	return redirect()->route('sliders-view');
    }

    public function delete($id)
    {
    	$slider = Slider::find($id);

    	if (file_exists('public/upload/slider_images/' . $slider->image) AND ! empty($slider->image)) {
    		unlink('public/upload/slider_images/' . $slider->image);
    	}

    	$slider->delete();

    	Session::flash('message','Slider Delete Successfully!');
    	return redirect()->route('sliders-view');
    }
}
