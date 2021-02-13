@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Admin Details
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  <a href="{{url('users/view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Admin Control</a>
  <div class="table-responsive">
    <h2 class="text-info"></h2>
    <span class="text-warning"></span>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th>Department</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php $i=1;  ?>
        @foreach($users as $user)
          @if($user->publicationStatus == 1 && $user->usertype == "Admin")
          <tr>
            <td width="9%">{{ $i++ }}</td>
            <td><img src="{{(!empty($user->image))?url('public/upload/user_images/'.$user->image):url('public/upload/no-image.png')}}" style="width: 60px; height: 60px; border: 1px solid #000;"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->deptName}}</td>
            <td>
              <a href="{{ route('users-edit',$user->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
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