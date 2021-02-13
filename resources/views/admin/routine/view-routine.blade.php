@if(Auth::user()->usertype == 'Admin')
@extends('admin.master')

@section('title')
View Routine
@endsection


@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  <a href="{{route('routines-add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> Add Routine</a>
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
          <th>Teacher</th>
          <th>Course</th>
          <th>Semester</th>
          <th>Batch</th>
          <th>Section</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sl No</th>
          <th>Teacher</th>
          <th>Course</th>
          <th>Semester</th>
          <th>Batch</th>
          <th>Section</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>

        <?php $i=1;  ?>
        @foreach($routines as $routine)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{$routine->name}}</td>
          <td>{{$routine->courseTitle}}</td>
          <td>{{$routine->semesterName}} - {{ date('Y')}}</td>
          <td>{{ Auth::user()->department->deptName }} - {{$routine->batch}}</td>
          <td>{{$routine->sectionName}}</td>
          <td width="13%;">
            <a href="{{ route('routines-edit',$routine->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
            <a href="{{ route('routines-delete',$routine->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
  </div>
</div>
</div>

@endsection
@endif