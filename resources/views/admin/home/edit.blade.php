@extends('admin.admin_master')

@section('content')

<div class="card-header card-header-border-bottom text-center">
    Edit About
</div>
<div class="card-body">
    <form action="{{route('update.about',[$homeEdit->id])}}" method="post" >
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">About  Tittle</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$homeEdit->title}}"  placeholder="Slider Title">
            @error('title')
                    <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Short Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="short_dis"  rows="3">{{$homeEdit->short_dis}}</textarea>
            @error('short_dis')
            <span class="text-danger">{{$message}}</span>
    @enderror
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Long Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="long_dis"  rows="3">{{$homeEdit->long_dis}}</textarea>
            @error('long_dis')
                    <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-footer pt-4 pt-5 mt-4 border-top">
            <button type="submit" class="btn btn-primary btn-default">Update About</button>
        </div>
       
    </form>
</div>
@endsection