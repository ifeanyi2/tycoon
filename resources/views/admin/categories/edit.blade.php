<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
              
                <div class="col-4 col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h1 class="cart-title">Edit Category</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.category', $category->id) }}" method="post" >
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="category">Category name</label>
                                    <input type="text" name="category_name" class="form-control @error('category_name') border-danger @enderror" value="{{ $category->category_name }}">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="submit" value="Update" class="btn btn-primary" style="width: 100%; color:blue">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
