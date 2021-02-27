

@extends('admin.admin_master')

@section('content')

    <div class="py-12">

        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">
                        @foreach ($images as $image)
                                <div class="col-md-4 mt-5" >
                                    <div class="card">
                                        <img src="{{asset($image->image)}}" alt="" srcset="">
                                    </div>
                                </div>
                        @endforeach
                      
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                            Multi Image
                            </div>

                            <div class="card-body">
                                <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Image </label>
                                        <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
                                          @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                      </div>  
                                    <button type="submit" class="col-12 btn btn-primary">Add IMage</button>
                                  </form>
                            </div>

                        </div>
                    </div>

            </div>
        </div>



































 
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            --}}
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div> --}}
            {{-- </div> --}}
    </div>
    
@endsection