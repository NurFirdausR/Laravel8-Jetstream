@extends('admin.admin_master')

@section('content')

<div class="card-header card-header-border-bottom text-center">
    Edit Contact
</div>
<div class="card-body">
    <form action="{{route('contactupdate',[$contact->id])}}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1"> Address</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3">{{$contact->address}}    </textarea>
        </div>
       
       
       
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Email</label>
            <input type="text" name="email" class="form-control" value="{{$contact->email}}    " id="exampleFormControlInput1" placeholder="Slider Title">

        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{$contact->phone}}" id="exampleFormControlInput1" placeholder="Slider Title">
        </div>
        <div class="form-footer pt-4 pt-5 mt-4 border-top">
            <button type="submit" class="btn btn-primary btn-default">Update Contact</button>
        </div>
    </form>
</div>
@endsection