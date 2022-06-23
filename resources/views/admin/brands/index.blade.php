@extends('admin.layouts.admin_master')



@section('title', 'Create Brand')
@section('admin')
<div class="container mt-5">
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2>
    </div>
    <hr>

    <div class="py-12">
        <div class="container">
            <h1 class="mb-5">All Brands</h1>
            <p><a href="{{ route('add.brand') }}" class="btn btn-info">Add new</a></p>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                <tr>
                                    <th>s/n</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Main Image</th>
                                    <th>Action</th>
                                </tr>
                                @if(count($brands) < 1) <p class="text-center text-info">No Brand Available</p>
                                    @else
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $brands->firstItem()+$loop->index }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ isset($brand->category) ? ucwords($brand->category->category_name) : "-" }}</td>
                                        <td>$ {{ $brand->price }}</td>
                                        <td><img src="{{ asset($brand->image1) }}" alt="{{ $brand->name }}"
                                                class="img-responsive" width="100"></td>
                                        <td>
                                            <a href="{{ route('view.brand', $brand->id) }}"
                                                class="btn btn-info btn-sm">view</a>
                                            &nbsp;
                                            <a href="{{ route('edit.brand', $brand->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            &nbsp;
                                            <a onclick="return confirm('This Brand Will Be Moved To Archieve, Are You Sure ?')"
                                                href="{{ route('delete.brand', $brand->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
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
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        @if(count($trashBrand) == 0)
                            <div class="card-header text-center">
                                <h2>No Brand In Archieve</h2>
                            </div>
                        @else
                         <div class="card-header text-center">
                                <h2>Brand In Archieve</h2>
                            </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Model</th>
                                    <th>Deleted At</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($trashBrand as $trash)
                                    <tr>
                                        <td>{{ $trashBrand->firstItem()+$loop->index }}</td>
                                        <td>{{ ucwords($trash->name) }}</td>
                                        <td>{{ ucwords($trash->model) }}</td>
                                        <td>{{ ucwords($trash->deleted_at->diffForHumans()) }}</td>
                                        <td>
                                            <a href="{{ route('restore.deleted.brand', $trash->id) }}" class="btn btn-success btn-small">Restore</a>

                                            <a onclick="return confirm('Click Ok! to delete this brand permanently!')" href="{{ route('permanent.delete.brand', $trash->id) }}" class="btn btn-danger btn-small">Delete Permanetly</a>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection