@if(Auth::user()->usertype == 'Admin')
@extends('admin.master')

@section('title')
View Batch
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  <a href="{{route('batchs-add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> Add Batch</a>
  <div class="table-responsive">
    <div class="text-center">
      @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{ Session::get('message')}}</strong>
        </div>
      @endif
      @if(Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{ Session::get('error')}}</strong>
        </div>
      @endif
    </div>
    <h2 class="text-info"></h2>
    <span class="text-warning"></span>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Batch</th>
          <th>Department</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sl No</th>
          <th>Batch</th>
          <th>Department</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
        <?php $i=1;  ?>
        @foreach($batchs as $batch)
        @if(Auth::user()->deptId == $batch->deptId)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $batch->batch }}</td>
          <td>{{ $batch['department']['deptName'] }}</td>
          <td>
            @if($batch->status == 1)
            <span class="badge bg-success text-light">Active</span>
            @else
            <span class="badge bg-warning text-light">Inactive</span>
            @endif
          </td>
          <td>
            @if($batch->status == 1)
            <a href="{{ route('batchs-inactive',$batch->id) }}" class="btn btn-success btn-sm"><i class=" fa fa-arrow-up"></i></a>
            @else
            <a href="{{ route('batchs-active',$batch->id) }}" class="btn btn-warning btn-sm"><i class=" fa fa-arrow-down"></i></a>
            @endif
            <a href="{{ route('batchs-edit',$batch->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
            <a href="{{ route('batchs-delete',$batch->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection
@endif