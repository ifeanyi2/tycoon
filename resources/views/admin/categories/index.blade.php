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
                        <table class="table table-hover">
                            <tr class="bg-dark text-light">
                                <td>S/N</td>
                                <td>Name</td>
                                <td>Added By</td>
                                <td>created At</td>
                                <td>Updated At</td>
                                <td>Action</td>
                            </tr>
                            
                               @foreach ($category as $value)
                                <tr>
                                    <td>{{ $category->firstItem()+$loop->index }}</td>
                                    <td>{{ ucwords($value->category_name) }}</td>
                                    <td>{{ ucwords($value->user->name) }}</td>
                                    <td>{{ $value->created_at->diffForHumans() }}</td>
                                    <td>{{ $value->updated_at->diffForHumans() }}</td>
                                    <td>
                                        
                                        <a href="{{ route('edit.category', $value->id) }}" class="btn btn-info btn-small">Edit</a>

                                        <a onclick="return confirm('Are You sure you want to delete')" href="{{ route('softdeleted.category', $value->id) }}" class="btn btn-warning btn-small">Delete</a>
                                    </td>
                                </tr>
                               @endforeach
                        </table>
                        {{ $category->links() }}
                    </div><br>
                    <hr color="crimson">
                    @if(count($trashCat) == 0)
                        <h1 class="text-center" style="margin-top:30px">No Deleted categoryies</h1>
                        
                    @else
                        <div class="table-responsive-md">
                           <h1 class="text-center" style="margin-top: 50px !important;font-size:24px !important">Deleted categories</h1>
                           <table class="table table-borderd">
                                <tr">
                                    <td>S/N</td>
                                    <td>Name</td>
                                    <td>Added By</td>
                                    <td>Deleted At</td>
                                    <td>Action</td>
                                </tr>

                            
                                
                                @foreach ($trashCat as $value)
                                    <tr>
                                        <td>{{ $category->firstItem()+$loop->index }}</td>
                                        <td>{{ ucwords($value->category_name) }}</td>
                                        <td>{{ ucwords($value->user->name) }}</td>
                                        <td>{{ $value->deleted_at->diffForHumans() }}</td>
                                        <td>
                                            
                                            <a href="{{ route('restore.category', $value->id) }}" class="btn btn-success btn-small">Restore</a>

                                            <a onclick="return confirm('You are about to delete category permanently!!')" href="{{ route('permanent.delete.category', $value->id) }}" class="btn btn-danger btn-small">Permanent Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            
                                </table>
                            
                            {{ $trashCat->links() }}
                        </div>
                    @endif
                </div>
                <div class="col-4 col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-header bg-dark text-light">
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
