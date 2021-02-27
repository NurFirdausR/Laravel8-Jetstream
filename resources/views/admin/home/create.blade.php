@extends('admin.admin_master')

@section('content')

<div class="card-header card-header-border-bottom text-center">
    Create About
</div>
<div class="card-body">
    <form action="{{route('store.about')}}" method="post" >
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">About  Tittle</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Slider Title">
            @error('title')
                    <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Short Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="short_dis" rows="3"></textarea>
            @error('short_dis')
            <span class="text-danger">{{$message}}</span>
    @enderror
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Long Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="long_dis" rows="3"></textarea>
            @error('long_dis')
                    <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-footer pt-4 pt-5 mt-4 border-top">
            <button type="submit" class="btn btn-primary btn-default">Tambah About</button>
        </div>
       
    </form>
</div>
@endsection