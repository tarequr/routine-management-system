@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Communicate View
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <div class="text-center">
      <strong class="text-center text-success">{{ Session::get('message')}}</strong>
      <div>
      	<strong>View Communicate</strong>
      </div>
    </div>
    <h2 class="text-info"></h2>
    <span class="text-warning"></span>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Name</th>
          <th>Address</th>
          <th>Mobile No</th>
          <th>Email</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sl No</th>
          <th>Name</th>
          <th>Address</th>
          <th>Mobile No</th>
          <th>Email</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
        <?php $i=1;  ?>
        @foreach($communicates as $communicate)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $communicate->name }}</td>
          <td>{{ $communicate->address }}</td>
          <td>{{ $communicate->phone }}</td>
          <td>{{ $communicate->email }}</td>
          <td>{{ $communicate->msg }}</td>
          <td>
            <a href="{{route('contacts-communicate-delete',$communicate->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
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