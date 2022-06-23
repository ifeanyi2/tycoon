@extends('admin.layouts.admin_master')



@section('title', 'Admin Dashboard')
@section('admin')


<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card mb-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card-header">
                    <h2>Categories</h2>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Name</td>
                                <td>Added By</td>
                                <td>created At</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($category as $value)
                            <tr>
                                <td>{{ $category->firstItem()+$loop->index }}</td>
                                <td>{{ ucwords($value->category_name) }}</td>
                                <td>{{ ucwords($value->user->name) }}</td>
                                <td>{{ $value->created_at->diffForHumans() }}</td>
                                <td>

                                    <a style="width: 54px" href="{{ route('edit.category', $value->id) }}"
                                        class="btn btn-info btn-small">Edit</a>

                                    <a onclick="return confirm('Are You sure you want to delete')"
                                        href="{{ route('softdeleted.category', $value->id) }}"
                                        class="btn btn-warning btn-small">Delete</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>Deleted Categories</h2>
                </div>
                @if(count($trashCat) == 0)
                <h1 class="text-center" style="margin-top:30px">No Deleted categoryies</h1>
                @else
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-hover">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Name</td>
                                <td>Added By</td>
                                <td>Deleted At</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($trashCat as $value)
                            <tr>
                                <td>{{ $trashCat->firstItem()+$loop->index }}</td>
                                <td>{{ ucwords($value->category_name) }}</td>
                                <td>{{ ucwords($value->user->name) }}</td>
                                <td>{{ $value->deleted_at->diffForHumans() }}</td>
                                <td>

                                    <a href="{{ route('restore.category', $value->id) }}"
                                        class="btn btn-success btn-small">Restore</a>

                                    <a onclick="return confirm('You are about to delete category permanently!!')"
                                        href="{{ route('permanent.delete.category', $value->id) }}"
                                        class="btn btn-danger btn-small">Permanent Delete</a>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
              <div class="card">
                        <div class="card-header bg-dark text-light">
                            <h3 class="card-title">Add new Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="category">Category name</label>
                                    <input type="text" name="category_name"
                                        class="form-control @error('category_name') border-danger @enderror"
                                        placeholder="Eg. BMW" value="{{ old('category_name') }}">
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


@endsection

