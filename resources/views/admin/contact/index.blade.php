@extends('admin.admin_master');

@section('content')

    <div class="py-12">

        <div class="container">
            <a href="{{route('add.contact')}}" class="btn btn-primary">Contact About</a>
            <div class="row">
                <div class="col-md-12">
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
                            All Contact
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%"> No </th>
                                    <th scope="col" width="7%">Contact Address</th>
                                    <th scope="col" width="20%">Contact Phone</th>
                                    <th scope="col" width="15%">Contact Email</th>
                                    <th scope="col" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$contact->address}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                        <td>
                                            <a href="{{route('contactedit',[$contact->id])}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('contactdelete',[$contact->id])}}" onclick="return confirm('Are you sure to Delete this Brand?')" class="btn btn-danger">Delete</a>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="col-md-4">
                        {{-- <div class="card">
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

                        </div> --}}
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
