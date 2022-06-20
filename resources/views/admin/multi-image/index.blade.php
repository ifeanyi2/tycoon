<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-8 col-sm-12 col-md-8">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive-md">

                        @if(count($images) == 0)
                             <p>No Images found</p>

                        @else
                        <table class="table table-hover">
                            <tr class="bg-dark text-light">
                                <td>S/N</td>
                                <td>Image</td>
                                <td>Brand</td>
                                <td>created At</td>
                                <td>Updated At</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                              @foreach($images as $image)
                                <tr>
                                    <td>{{ $images->firstItem()+$loop->index }}</td>
                                    <td><img width="80" src="{{ asset($image->images) }}" alt="{{ $image->brand->name }}"></td>
                                    <td>{{ ucwords($image->brand->name) }}</td>
                                    <td>{{ $image->created_at->diffForHumans() }}</td>
                                    <td>{{ $image->updated_at->diffForHumans() }}</td>
                                    <td>
                                       <a href="{{ route('edit.images', $image->id) }}" class="btn btn-small btn-info">Edit</a>
                                       <a onclick="return confirm('Click ok to confirm delete')" href="{{ route('delete.images', $image->id) }}" class="btn btn-small btn-danger">Delete</a>


                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                              
                        </table>
                        @endif
                        {{ $images->links() }}
                    
                    </div><br>
                    <hr color="crimson">
                 
                </div>
                <div class="col-4 col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            <h3 class="cart-title">Add Brand Images</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.images') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="category">Multiple Images</label>
                                    <input type="file" name="images[]" class="form-control @error('images') border-danger @enderror" multiple>
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category">Brand</label>
                                    <select name="brand_id" class="form-control @error('brand_id') border-danger @enderror">
                                        <option value="" selected disabled>Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    
                                    
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="submit" value="Submit" class="btn btn-outline-info" style="width: 100%">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
