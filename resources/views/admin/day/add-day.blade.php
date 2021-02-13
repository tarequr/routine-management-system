@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Add Day
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('days-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Day</a>
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
                @if($countDay<7)
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Day!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('days-save') }}">
                     @csrf

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Semester Name</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="dayOne" required="">
                            <option value="">~~~ Select ~~~</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Save Day">
                      </div>
                    </div>
                  </form>
                </div>
                @else
                  <div class="text-center">
                    <h3>
                      <a href="{{route('logos-view')}}" class="btn btn-danger">Day Already Taken</a>
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