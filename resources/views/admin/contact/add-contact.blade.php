@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Add Contact
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('contacts-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Contact</a>
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
                @if($countContact<1)
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Contact!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('contacts-save') }}">
                     @csrf

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                      	<input type="text" name="address" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">E-mail</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Facebook</label>
                      <div class="col-sm-9">
                        <input type="text" name="facebook" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Twitter</label>
                      <div class="col-sm-9">
                        <input type="text" name="twitter" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">YouTube</label>
                      <div class="col-sm-9">
                        <input type="text" name="youtube" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">LinkIn</label>
                      <div class="col-sm-9">
                        <input type="text" name="linkeIn" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Save Contact">
                      </div>
                    </div>
                  </form>
                </div>
                @endif
                @if($countContact>0)
                  <div class="text-center">
                    <h3>
                      <a href="{{route('logos-view')}}" class="btn btn-danger">Contact Already Taken</a>
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