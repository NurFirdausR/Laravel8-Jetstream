@extends('admin.admin_master')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update</h2>
    </div>
        
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>
      {{session('success')}}
      </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>
      {{session('error')}}
      </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card-body">
        <form action="{{route('profile.update')}}" method="POST" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3"> Username</label>
                <input type="text" class="form-control" name="name"  value="{{$user['name']}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3"> Email</label>
                <input type="email" class="form-control" name="email"  value="{{$user['email']}}">
            </div>
            
           <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection