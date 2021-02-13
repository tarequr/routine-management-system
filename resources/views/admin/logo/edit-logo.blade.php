@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Edit Logo
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('logos-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-image"></i> Manage Logo</a>
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
                    <h1 class="h4 text-gray-900 mb-4">Update Logo!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('logos-update',$editLogo->id) }}" enctype="multipart/form-data">
                     @csrf
                   
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Image</label>
                      <div class="col-sm-9">
                      	<input type="file" name="image" id="image">
                      </div>
                    </div>
                    <div class="form-group row">
                    	<label class="col-sm-3 col-form-label"></label>
                    	<div class="col-sm-9">
                    		<img src="{{(!empty($editLogo->image))?url('public/upload/logo_images/'.$editLogo->image):url('public/upload/no-image.png')}}" style="width: 150px; height: 150px; border: 1px solid #000;" id="showImage">
                    	</div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Update Logo">
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