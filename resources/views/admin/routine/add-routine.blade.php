@if(Auth::user()->usertype == 'Admin')
@extends('admin.master')

@section('title')
Assign Routine
@endsection

@push('css')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/admin/')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('public/admin/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('routines-view')}}" class="btn btn-primary float-right btn-sm"><i class="fas fa-fw fa-wrench"></i> Manage Routine</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Assign Teacher!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('routines-save') }}">
                     @csrf

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="deptId" required>
                            <option value="">select department</option>
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
                            <option value="">select semester</option>
                            @foreach($semesters as $semester)
                            <option value="{{ $semester->id }}"> {{ $semester->semesterName }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Teacher Name</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="teacherId" required>
                            <option value="">select teacher</option>
                            @foreach($users as $user)
                              @if($user->usertype == "Teacher")
                              <option value="{{ $user->id }}"> {{ $user->name }}</option>
                              @endif
                            @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Batch</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="batchId" required>
                            <option value="">select batch</option>
                            @foreach($batchs as $batch)
                            <option value="{{ $batch->id }}"> {{ $batch->batch }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Course Title</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="courseId" required>
                            <option value="">select course</option>
                            @foreach($courses as $course)
                            <option value="{{ $course->id }}"> {{ $course->courseTitle }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Section</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="sectionId" required>
                            <option value="">select section</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->id }}"> {{ $section->sectionName }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Save Routine">
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

@push('js')

<script src="{{asset('public/admin/')}}/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
   
  })
</script>
@endpush

@endif