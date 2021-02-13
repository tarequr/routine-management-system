@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Add Department
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('departments-view')}}" class="btn btn-primary float-right btn-sm"><i class="fas fa-fw fa-wrench"></i> Manage Department</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Add Department!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('departments-save') }}">
                     @csrf
                   
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                         <input type="text" name="deptName" class="form-control" value="{{ old('deptName')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="deptDescription" rows="5"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Publication Status</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="publicationStatus" required="">
                            <option value="">~~~ Select ~~~</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Save Department">
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