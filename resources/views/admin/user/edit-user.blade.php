@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Update Users
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
                    <h3 class="text-center text-success"> <!-- {{ Session::get('message')}}  --></h3>
                    <h1 class="h4 text-gray-900 mb-4">Update User!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('users-update',$editUser->id) }}">
                     @csrf
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">User Role</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="usertype">
                          <option>~~~ Select User Role ~~~</option>
                          <option value="SuperAdmin" {{($editUser->usertype=="SuperAdmin") ? "selected":""}}>Super-Admin</option>
                          <option value="Admin" {{($editUser->usertype=="Admin") ? "selected":""}}>Admin</option>
                          <option value="Teacher" {{($editUser->usertype=="Teacher") ? "selected":""}}>Teacher</option>
                          <option value="Student" {{($editUser->usertype=="Student") ? "selected":""}}>Student</option>
                          <strong class="text-danger"> {{$errors->has('usertype') ? $errors->first('usertype') : '' }} </strong>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="deptId" required>
                            <option value="">~~~ Select ~~~</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{($editUser->deptId== $department->id) ? "selected":""}}>{{ $department->deptName }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                         <input type="text" name="name" value="{{$editUser->name}}" class="form-control">
                         <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                         <input type="email" name="email" value="{{$editUser->email}}" class="form-control">
                         <strong class="text-danger"> {{$errors->has('email') ? $errors->first('email') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Publication Status</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="publicationStatus">
                            <option value="">~~~ Select ~~~</option>
                            <option value="1" {{($editUser->publicationStatus== 1) ? "selected":""}}>Published</option>
                            <option value="0" {{($editUser->publicationStatus== 0) ? "selected":""}}>Unpublished</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Update User Info">
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