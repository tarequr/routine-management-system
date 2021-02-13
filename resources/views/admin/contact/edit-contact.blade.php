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
      <a href="{{route('contacts-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Service</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Update Contact!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('contacts-update',$editcontact->id) }}">
                     @csrf

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" name="address" value="{{$editcontact->address}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" name="mobile" value="{{$editcontact->mobile}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">E-mail</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" value="{{$editcontact->email}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Facebook</label>
                      <div class="col-sm-9">
                        <input type="text" name="facebook" value="{{$editcontact->facebook}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Twitter</label>
                      <div class="col-sm-9">
                        <input type="text" name="twitter" value="{{$editcontact->twitter}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">YouTube</label>
                      <div class="col-sm-9">
                        <input type="text" name="youtube" value="{{$editcontact->youtube}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">LinkIn</label>
                      <div class="col-sm-9">
                        <input type="text" name="linkeIn" value="{{$editcontact->linkeIn}}" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Update Contact">
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
@ndif