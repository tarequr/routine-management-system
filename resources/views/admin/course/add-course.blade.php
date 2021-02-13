@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Add Course
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('courses-view')}}" class="btn btn-primary float-right btn-sm"><i class="fas fa-fw fa-wrench"></i> Manage Course</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Add Course!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('courses-save') }}">
                     @csrf
                   
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="course">Course Title</label>
                      <div class="col-sm-9">
                         <input type="text" id="course" name="courseTitle" class="form-control" value="{{ old('courseTitle')}}" placeholder="Enter course title" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="code">Course Code</label>
                      <div class="col-sm-9">
                         <input type="text" id="code" name="courseCode" class="form-control" value="{{ old('courseCode')}}" placeholder="Enter course code" required>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Course Type</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="courseType" required>
                            <option value="">~~~ Select ~~~</option>
                            <option value="1">Theory</option>
                            <option value="0">Lab</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="deptId" required>
                            <option value="">~~~ Select ~~~</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}"> {{ $department->deptName }}</option>
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
                            <option value="{{ $semester->id }}"> {{ $semester->semesterName }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Publication Status</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="publicationStatus" required>
                            <option value="">~~~ Select ~~~</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Save Course">
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