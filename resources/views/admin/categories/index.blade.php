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
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td>S/N</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>created At</td>
                                <td>Action</td>
                            </tr>
                            
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    
                                    <a href="" class="btn btn-info btn-small">Edit</a>
                                    <a href="" class="btn btn-danger btn-small">Delete</a>
                                </td>
                            </tr>
                            
                            
                        </table>
                    </div>
                </div>
                <div class="col-4 col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h1 class="cart-title">Add new Category</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="post" >
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="category">Category name</label>
                                    <input type="text" name="category_name" class="form-control @error('category_name') border-danger @enderror" placeholder="Eg. BMW" value="{{ old('category_name') }}">
                                    @error('category_name')
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
