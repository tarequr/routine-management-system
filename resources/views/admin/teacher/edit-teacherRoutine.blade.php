@if(Auth::user()->usertype == 'Teacher')
@extends('admin.master')

@section('title')
Edit Teacher Routine
@endsection

@section('content')
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="text-center">
          @if(Session::get('message'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>{{ Session::get('message')}}</strong>
              </div>
          @endif
          @if(Session::get('scheduleMessage'))
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>{{ Session::get('scheduleMessage')}}</strong>
              </div>
          @endif
          <h3 class="text-center">Teacher Make Routine</h3>
        </div>
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Day1 Teacher Routine!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('teachers-day1Routine',$editTeacherRoutine->id) }}">
                     @csrf

                    <input type="hidden" name="day_one">

                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Day 1</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="dayId" required>
                            <option value="">~~~ Select ~~~</option>
                            @foreach($days as $day)
                            <option value="{{ $day->id }}"> {{ $day->dayOne }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Room</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="roomId" required>
                            <option value="">~~~ Select ~~~</option>
                            @foreach($rooms as $room)
                            <option value="{{ $room->id }}"> {{ $room->roomNo }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Time</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="timeId" required>
                            <option value="">~~~ Select ~~~</option>
                            @foreach($times as $time)
                              <option value="{{ $time->id }}"> {{ $time->time }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Add Day1 Routine Info">
                      </div>
                    </div>
                  </form>
                </div>
              </div>

          <!-- Day2 Teacher Routine! -->
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Day2 Teacher Routine!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('teachers-day1Routine',$editTeacherRoutine->id) }}">
                     @csrf
                     
                  <input type="hidden" name="day_two">
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Day 2</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="dayId" required>
                            <option value="0">~~~ Select ~~~</option>
                            @foreach($days as $day)
                            <option value="{{ $day->id }}"> {{ $day->dayOne }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Room</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="roomId" required>
                            <option value="0">~~~ Select ~~~</option>
                            @foreach($rooms as $room)
                            <option value="{{ $room->id }}"> {{ $room->roomNo }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Time</label>
                      <div class="col-sm-9">
                          <select class="form-control input-height" name="timeId" required>
                            <option value="0">~~~ Select ~~~</option>
                            @foreach($times as $time)
                              <option value="{{ $time->id }}"> {{ $time->time }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Add Day2 Routine Info">
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
