@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Add Room
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('rooms-view')}}" class="btn btn-primary float-right btn-sm"><i class="fas fa-fw fa-wrench"></i> Manage Room</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Add Room!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('rooms-save') }}">
                     @csrf
                   
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="room">Room No</label>
                      <div class="col-sm-9">
                         <input type="text" id="room" name="roomNo" class="form-control" value="{{ old('roomNo')}}" placeholder="Enter room number" required>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Room Type</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="roomType" required>
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
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Save Room">
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