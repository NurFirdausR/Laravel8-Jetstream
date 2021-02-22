<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            All Categories
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
                      <a href="{{route('exportCategory')}}" class="btn btn-warning">Export</a>
                        <div class="card-header">
                            All Category
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->user->name}}</td>
                                    @if ($category->created_at == NULL)
                                        <span class="text-danger">NO Date</span>
                                      @else  
                                      <td>{{    Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
                                        @endif
                                        <td>
                                            <a href="{{route('categoryedit',[$category->id])}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('categorysoftdelete',[$category->id])}}" class="btn btn-danger">Delete</a>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                            Add Category
                            </div>
                            <div class="card-body">
                                <form action="{{route('store.category')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Category Name </label>
                                      <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('category_name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                
                                    <button type="submit" class="col-12 btn btn-primary">Add Category</button>
                                  </form>
                            </div>
                        </div>
                    </div>

            </div>
        </div>



































        {{-- Trash part --}}
<br>
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
                            Trash List
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trachCat as $category)
                                    
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->user->name}}</td>
                                    @if ($category->created_at == NULL)
                                        <span class="text-danger">NO Date</span>
                                      @else  
                                      <td>{{    Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
                                        @endif
                                        <td>
                                            <a href="{{route('categoryrestore',[$category->id])}}" class="btn btn-dark">Restore</a>
                                            <a href="{{route('categorypdelete',[$category->id])}}" class="btn btn-danger">P Delete</a>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$trachCat->links()}}
                    </div>
                </div>
                    <div class="col-md-4">
                       
                    </div>

            </div>
        </div>

        {{-- End trach --}}
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            --}}
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div> --}}
            {{-- </div> --}}
    </div>
</x-app-layout>
