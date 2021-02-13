<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Batch;
use Auth;
use Session;

class BatchController extends Controller
{
    public function view()
    {
    	$batchs     = Batch::orderBy('id','desc')->get();
    	return view('admin.batch.view-batch',['batchs'=>$batchs]);
    }

    public function add()
    {
    	return view('admin.batch.add-batch');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'batch'  => 'required|unique:batches',
        ]);

    	$batch = new Batch();

    	$batch->batch  = $request->batch;
    	$batch->deptId = Auth::user()->deptId;
    	$batch->save();

    	Session::flash('message','Batch Save Successfully!');
    	return redirect()->route('batchs-view');
    }

    public function inactive($id)
    {
        $batch = Batch::find($id);
        $batch->status = 0;
        $batch->save();

        Session::flash('message','Batch Inactive Successfully!');
        return back();
    }

    public function active($id)
    {
        $batch = Batch::find($id);
        $batch->status = 1;
        $batch->save();

        Session::flash('message','Batch Active Successfully!');
        return back();
    }

    public function edit($id)
    {
        $editbatch = Batch::find($id);
        return view('admin.batch.edit-batch',['editbatch'=>$editbatch]);
    }

    public function update(Request $request,$id)
    {
        $batch = Batch::find($id);

        $this->validate($request,[
            'batch'  => 'required|unique:batches,batch,'.$batch->id,
        ]);

        $batch->batch  = $request->batch;
        $batch->save();

        Session::flash('message','Batch Update Successfully!');
        return redirect()->route('batchs-view');
    }

    public function delete($id)
    {
    	$batch = Batch::find($id);
    	$batch->delete();

    	Session::flash('message','Batch Delete Successfully!');
    	return redirect()->route('batchs-view');
    }
}
