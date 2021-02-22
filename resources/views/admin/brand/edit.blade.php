<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Edit Brands
            <b style="float: right">

            </b>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            
            <div class="col-md-8">
                <div class="card">
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
                    
                            <div class="card-header text-center">
                            Edit Brand
                            </div>
                            <div class="card-body">
                                <form action="{{route('brandupdate',[$brands->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Update Brand Name </label>
                                      <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands->brand_name}}">
                                        @error('brand_name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Update Brand Image </label>
                                        <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands->brand_image}}">
                                          @error('brand_image') <span class="text-danger">{{$message}}</span> @enderror
                                      </div>

                                      <div class="form-group">
                                        <img src="{{asset($brands->brand_image)}}" style="width:200px; height: 200px;" alt="" srcset="">
                                    </div>
                                      
                                
                                    <button type="submit" class="col-12 btn btn-primary">Update Category</button>
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
</x-app-layout>
