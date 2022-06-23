@extends('admin.layouts.admin_master')



@section('title', 'Edit Category')
@section('admin')


<div class="container mt-5">

    <div class="row mt5">
        <div class="col-md-3 col-lg-3 col-sm-12"></div>
        <div class="col-md-6 col-lg-6 col-sm-12">
       

            <div class="card">
                 <div class="card-header">
                         <h1 class="card-title">Edit Category</h1>
                 </div>
                <div class="card-body">
                    <form action="{{ route('update.category', $category->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="category">Category Name</label>
                            <input type="text" name="category_name"
                                class="form-control @error('category_name') border-danger @enderror"
                                value="{{ $category->category_name }}">
                            @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="submit" value="Update" class="btn btn-primary" style="width: 100%;">
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-3 col-lg-3 col-sm-12"></div>

    </div>
</div>
@endsection