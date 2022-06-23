@extends('admin.layouts.admin_master')



@section('title', 'Brand Images')
@section('admin')
<div class="container mt-5">
    <div name="header">
        <h2 class="text-center">
            Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2><br><br>
    </div>

    <div class="row">
        <div class="col-md-7 col-sm-12 col-lg-7">
            <div class="card">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      
                    </button>
                </div>
                @endif
                <div class="card-header">
                    <h3>All Brand Images</h3>
                </div>
                <div class="card-body">
                    @if(count($images) == 0)
                    <p>No Images found</p>

                    @else
                    <table id="datatablesSimple" class="table table-hover">
                        <tr>
                            <td>S/N</td>
                            <td>Image</td>
                            <td>Brand</td>
                            <td>created At</td>
                            <td>Action</td>
                        </tr>
                        <tbody>
                            @foreach($images as $image)
                            <tr>
                                <td>{{ $images->firstItem()+$loop->index }}</td>
                                <td><img width="80" src="{{ asset($image->images) }}" alt="{{ isset($image->brand->name) ? ucwords($image->brand->name) : "-" }}">
                                </td>
                                <td>{{ isset($image->brand->name) ? ucwords($image->brand->name) : "-" }}</td>
                                <td>{{ $image->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('edit.images', $image->id) }}"
                                        class="btn btn-small btn-info">Edit</a>
                                    <a onclick="return confirm('Click ok to confirm delete')"
                                        href="{{ route('delete.images', $image->id) }}"
                                        class="btn btn-small btn-danger">Delete</a>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @endif
                    {{ $images->links() }}

                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-12 col-lg-5">
            <div class="card mt-5">
                <div class="card header">
                    <h2>Add Brand Images</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.images') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="category">Multiple Images</label>
                            <input type="file" name="images[]"
                                class="form-control @error('images') border-danger @enderror" multiple>
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
                        <input type="submit" value="Submit" class="btn btn-info" style="width: 100%">
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection