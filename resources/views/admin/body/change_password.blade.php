@extends('admin.admin_master')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
        
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
        <form action="{{route('password.update')}}" method="POST" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3"> Current Password</label>
                <input type="password" class="form-control" name="oldpassword" id="current_password" placeholder="Enter Current  Password">
                @error('oldpassword')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3"> New Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter New  Password">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation"id="password_confirmation" placeholder=" COnfirm Password">
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
           <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection