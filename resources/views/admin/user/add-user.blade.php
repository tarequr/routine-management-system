@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Users
@endsection

@section('content')

  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('users-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage User</a>
    </div>
  </div><br>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-9 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h3 class="text-center text-success"> {{ Session::get('message')}} </h3>
                    <h1 class="h4 text-gray-900 mb-4">Add User!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('users-save') }}">
                     @csrf
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">User Role</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="usertype">
                          <option value="">~~~ Select User Role ~~~</option>
                          <!-- <option value="SuperAdmin">Super-Admin</option> -->
                          <option value="Admin">Admin</option>
                          <option value="Teacher">Teacher</option>
                          <option value="Student">Student</option>
                        </select>
                        <strong class="text-danger"> {{$errors->has('usertype') ? $errors->first('usertype') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="deptId">
                            <option value="">~~~ Select ~~~</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}"> {{ $department->deptName }}</option>
                            @endforeach
                          </select>
                          <strong class="text-danger"> {{$errors->has('deptId') ? $errors->first('deptId') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                         <input type="text" name="name" class="form-control" value="{{ old('name')}}">
                         <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                         <input type="email" name="email" class="form-control" value="{{old('email')}}">
                         <strong class="text-danger"> {{$errors->has('email') ? $errors->first('email') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                         <input type="password" name="password" class="form-control">
                         <strong class="text-danger"> {{$errors->has('password') ? $errors->first('password') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Confirm Password</label>
                      <div class="col-sm-9">
                         <input type="password" name="confirmPassword" class="form-control">
                         <strong class="text-danger"> {{$errors->has('confirmPassword') ? $errors->first('confirmPassword') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Publication Status</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="publicationStatus" >
                            <option value="">~~~ Select ~~~</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                          </select>
                          <strong class="text-danger"> {{$errors->has('publicationStatus') ? $errors->first('publicationStatus') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Save User Info">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@endif