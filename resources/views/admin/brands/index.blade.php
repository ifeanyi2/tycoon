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
                    <table class="table table-bordered">
                        <tr>
                            <th>s/n</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Engine Size</th>
                            <th>Power</th>
                            <th>Color</th>
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
                               <td>{{ $brand->firstItem()+$loop->index }} }}</td>
                               <td>{{ $brand->name }}</td>
                               <td>{{ $brand->type }}</td>
                               <td>{{ $brand->make }}</td>
                               <td>{{ $brand->model }}</td>
                               <td>{{ $brand->engine_size }}</td>
                               <td>{{ $brand->power }}</td>
                               <td>{{ $brand->color }}</td>
                               <td>{{ $brand->price }}</td>
                               <td>{{ ('image') }}</td>
                               <td>{{ $brand->created_at->diffForHumans() }}</td>
                               <td>
                                   <a href="" class="btn btn-info">view</a>
                                   <a href="" class="btn btn-primary">Edit</a>
                                   <a href="" class="btn btn-danger">Delete</a>
                               </td>
                           </tr>
                               
                           @endforeach
                        @endif
                        <tr>

                        </tr>
                    </table>
               </div>
               </div>

              
           </div>
        </div>
    </div>
</x-app-layout>
