@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Edit Semester
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('semesters-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Semester</a>
    </div>
  </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update Semester!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('semesters-update',$editSemester->id) }}">
                     @csrf

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Semester Name</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="semesterName" required="">
                            <option value="">~~~ Select ~~~</option>
                            <option value="Spring" {{($editSemester->semesterName== "Spring") ? "selected":""}}>Spring</option>
                            <option value="Summer" {{($editSemester->semesterName== "Summer") ? "selected":""}}>Summer</option>
                            <option value="Fall" {{($editSemester->semesterName== "Fall") ? "selected":""}}>Fall</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Update Semester">
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