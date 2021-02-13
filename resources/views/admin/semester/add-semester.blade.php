@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Add Semester
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
                @if($countSemester<3)
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Semester!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('semesters-save') }}">
                     @csrf

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Semester Name</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="semesterName" required="">
                            <option value="">~~~ Select ~~~</option>
                            <option value="Spring">Spring</option>
                            <option value="Summer">Summer</option>
                            <option value="Fall">Fall</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Save Semester">
                      </div>
                    </div>
                  </form>
                </div>
                @else
                  <div class="text-center">
                    <h3>
                      <a href="{{route('semesters-view')}}" class="btn btn-danger">Semester Already Taken</a>
                    </h3>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@endif
