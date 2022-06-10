<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td>S/N</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>created At</td>
                                <td>Action</td>
                            </tr>
                            @php($n = 1)
                            @foreach($users as $user)
                                <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->created_at == NULL)
                                        <span class="text-danger">No Date set</span>
                                    @else
                                       {{ $user->created_at->diffForHumans()}}     
                                       
                                    @endif
                                </td>
                                <td>
                                    
                                    <a href="" class="btn btn-info btn-small">Edit</a>
                                    <a href="" class="btn btn-danger btn-small">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
