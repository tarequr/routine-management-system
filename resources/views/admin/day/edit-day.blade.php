@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Edit Service
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('days-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Service</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Update Day!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('days-update',$editday->id) }}">
                     @csrf

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Day Name</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="dayOne" required="">
                            <option value="">~~~ Select ~~~</option>
                            <option value="Saturday" {{($editday->dayOne=="Saturday") ? "selected":""}}>Saturday</option>
                            <option value="Sunday" {{($editday->dayOne=="Sunday") ? "selected":""}}>Sunday</option>
                            <option value="Monday" {{($editday->dayOne=="Monday") ? "selected":""}}>Monday</option>
                            <option value="Tuesday" {{($editday->dayOne=="Tuesday") ? "selected":""}}>Tuesday</option>
                            <option value="Wednesday" {{($editday->dayOne=="Wednesday") ? "selected":""}}>Wednesday</option>
                            <option value="Thursday" {{($editday->dayOne=="Thursday") ? "selected":""}}>Thursday</option>
                            <option value="Friday" {{($editday->dayOne=="Friday") ? "selected":""}}>Friday</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Update Day">
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