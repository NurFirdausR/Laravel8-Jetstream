<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            All Brand
            <b style="float: right">

            </b>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">

            <div class="row">
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
                        <div class="card-header">
                            All Brand
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$brand->brand_name}}</td>
                                    <td><img src="{{ asset($brand->brand_image) }}" style="width: 100px; height:100px;" alt="" srcset=""></td>
                                    @if ($brand->created_at == NULL)
                                        <span class="text-danger">NO Date</span>
                                      @else  
                                      <td>{{    Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}</td>
                                        @endif
                                        <td>
                                            <a href="{{route('brandedit',[$brand->id])}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('branddelete',[$brand->id])}}" onclick="return confirm('Are you sure to Delete this Brand?')" class="btn btn-danger">Delete</a>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$brands->links()}}
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                            Add Brand
                            </div>

                            <div class="card-body">
                                <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Brand Name </label>
                                      <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('brand_name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Image </label>
                                        <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                          @error('brand_image') <span class="text-danger">{{$message}}</span> @enderror
                                      </div>
                                
                                    <button type="submit" class="col-12 btn btn-primary">Add Brand</button>
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
