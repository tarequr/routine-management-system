@if(Auth::user()->usertype == 'SuperAdmin')
@extends('admin.master')

@section('title')
Contact
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  @if($countContact<1)
  <a href="{{route('contacts-add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> Add Contact</a>
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
          <th>Address</th>
          <th>Mobile No</th>
          <th>Email</th>
          <th>Facebook</th>
          <th>Twitter</th>
          <th>YouTube</th>
          <th>LinkIn</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sl No</th>
          <th>Address</th>
          <th>Mobile No</th>
          <th>Email</th>
          <th>Facebook</th>
          <th>Twitter</th>
          <th>YouTube</th>
          <th>LinkIn</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
        <?php $i=1;  ?>
        @foreach($contacts as $contact)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $contact->address }}</td>
          <td>{{ $contact->mobile }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->facebook }}</td>
          <td>{{ $contact->twitter }}</td>
          <td>{{ $contact->youtube }}</td>
          <td>{{ $contact->linkeIn }}</td>
          <td>
            <a href="{{ route('contacts-edit',$contact->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
            <a href="{{ route('contacts-delete',$contact->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
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