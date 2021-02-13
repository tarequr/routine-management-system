@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Edit Course
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('courses-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Course</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Update Course!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('courses-update',$editCourse->id) }}">
                     @csrf

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="course">Course Title</label>
                      <div class="col-sm-9">
                         <input type="text" id="course" name="courseTitle" class="form-control" value="{{$editCourse->courseTitle}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="code">Course Code</label>
                      <div class="col-sm-9">
                         <input type="text" id="code" name="courseCode" class="form-control" value="{{$editCourse->courseCode}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Course Type</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="courseType" required>
                            <option value="">~~~ Select ~~~</option>
                            <option value="1" {{($editCourse->courseType== 1) ? "selected":""}}>Theory</option>
                            <option value="0" {{($editCourse->courseType== 0) ? "selected":""}}>Lab</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="deptId" required>
                            <option value="">~~~ Select ~~~</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{($editCourse->deptId== $department->id) ? "selected":""}}>{{ $department->deptName }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Semester</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="semesterId" required>
                            <option value="">~~~ Select ~~~</option>
                            @foreach($semesters as $semester)
                            <option value="{{ $semester->id }}" {{($editCourse->semesterId== $semester->id) ? "selected":""}}>{{ $semester->semesterName }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Publication Status</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="publicationStatus">
                            <option value="">~~~ Select ~~~</option>
                            <option value="1" {{($editCourse->publicationStatus== 1) ? "selected":""}}>Published</option>
                            <option value="0" {{($editCourse->publicationStatus== 0) ? "selected":""}}>Unpublished</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Update Course">
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