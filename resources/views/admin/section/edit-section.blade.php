@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Edit Section
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('sections-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Section</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Update Section!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('sections-update',$editSection->id) }}">
                     @csrf
                     
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Section Name</label>
                      <div class="col-sm-9">
                         <select class="form-control input-height" name="sectionName" required="">
                            <option value="">~~~ Select ~~~</option>
                            <option value="A" {{($editSection->sectionName== "A") ? "selected":""}}>A</option>
                            <option value="B" {{($editSection->sectionName== "B") ? "selected":""}}>B</option>
                            <option value="C" {{($editSection->sectionName== "C") ? "selected":""}}>C</option>
                            <option value="D" {{($editSection->sectionName== "D") ? "selected":""}}>D</option>
                            <option value="E" {{($editSection->sectionName== "E") ? "selected":""}}>E</option>
                            <option value="F" {{($editSection->sectionName== "F") ? "selected":""}}>F</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Update Section">
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