<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <h1 class="mb-5">All Brands</h1>
           
           <div class="row">

               <a href="{{ route('add.brand') }}" class="btn btn-info mb-3 ml-3">Add new</a>
               <div class="col-md-12">
                   <div class="table-responsive-md">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-hover">
                        <tr>
                            <th>s/n</th>
                            <th>Name</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Main Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @if(count($brands) < 1)

                           <p class="text-center text-info">No Brand Available</p>
                        @else
                           @foreach($brands as $brand)
                           <tr>
                               <td>{{ $brands->firstItem()+$loop->index }}</td>
                               <td>{{ $brand->name }}</td>
                               <td>{{ $brand->model }}</td>
                               <td>$ {{ $brand->price }}</td>
                               <td><img src="{{ asset($brand->image1) }}" alt="{{ $brand->name }}" class="img-responsive" width="100"></td>
                               <td>{{ $brand->created_at->diffForHumans() }}</td>
                               <td>
                                   <a href="" class="btn btn-info btn-sm">view</a>
                                   <a href="{{ route('edit.brand', $brand->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                   <a onclick="return confirm('This Brand Will Be Moved To Archieve, Are You Sure ?')" href="{{ route('delete.brand', $brand->id) }}" class="btn btn-danger btn-sm">Delete</a>
                               </td>
                           </tr>
                               
                           @endforeach
                        @endif
                        <tr>

                        </tr>
                    </table>
                    {{ $brands->links() }}
               </div>
               </div>

              
           </div>
        </div>
    </div>
</x-app-layout>
