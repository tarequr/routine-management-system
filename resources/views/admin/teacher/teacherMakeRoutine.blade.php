@if(Auth::user()->usertype == 'Teacher')
@extends('admin.master')

@section('title')
View Routine
@endsection


@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <div class="text-center">
      <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
      <h3 class="text-center text-danger"></h3>
    </div>
    <h2 class="text-info"></h2>
    <span class="text-warning"></span>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Course Code</th>
          <th>Teacher</th>
          <th>Course Type</th>
          <th>Semester</th>
          <th>Batch</th>
          <th>Section</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sl No</th>
          <th>Course Code</th>
          <th>Teacher</th>
          <th>Course Type</th>
          <th>Semester</th>
          <th>Batch</th>
          <th>Section</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
        <?php $i=1;  ?>
        @foreach($showRoutines as $showRoutine)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{$showRoutine->courseCode}}</td>
          <td>{{$showRoutine->name}}</td>
          <td>{{$showRoutine->courseType == 1 ? 'Theory' : 'Lab'}}</td>
          <td>{{$showRoutine->semesterName}} - {{ date('Y')}}</td>
          <td>{{ Auth::user()->department->deptName }} - {{$showRoutine->batch}}</td>
          <td>{{$showRoutine->sectionName}}</td>
          <td>
            <a href="{{ route('teachers-editRoutine',$showRoutine->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
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