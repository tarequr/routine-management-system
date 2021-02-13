@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
logos
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  @if($countLogo<1)
  <a href="{{route('logos-add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> Add logo</a>
  @endif
  <div class="table-responsive">
    <div class="text-center">
      @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{ Session::get('message')}}</strong>
        </div>
      @endif
      @if(Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{ Session::get('error')}}</strong>
        </div>
      @endif
    </div>
    <h2 class="text-info"></h2>
    <span class="text-warning"></span>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Logo</th>
          <th>Created By</th>
          <th>Update By</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sl No</th>
          <th>Logo</th>
          <th>Created By</th>
          <th>Update By</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
        <?php $i=1;  ?>
        @foreach($logos as $logo)
        <tr>
          <td>{{ $i++ }}</td>
          <td><img src="{{(!empty($logo->image))?url('public/upload/logo_images/'.$logo->image):url('public/upload/no-image.png')}}" style="width: 120px; height: 100px; border: 1px solid #000;"></td>
          <td>{{ $logo->createdBy }}</td>
          <td>{{ $logo->updatedBy }}</td>
          <td>
            <a href="{{ route('logos-edit',$logo->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
            <a href="{{ route('logos-delete',$logo->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection
@endif