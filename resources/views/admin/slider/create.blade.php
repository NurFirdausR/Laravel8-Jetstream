@extends('admin.admin_master')

@section('content')

<div class="card-header card-header-border-bottom text-center">
    Create Slider
</div>
<div class="card-body">
    <form action="{{route('store.slider')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Slider  Tittle</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Slider Title">
        </div>
       
       
       
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-footer pt-4 pt-5 mt-4 border-top">
            <button type="submit" class="btn btn-primary btn-default">Submit</button>
        </div>
    </form>
</div>
@endsection