@extends('admin.layouts.admin_master')



@section('title', 'Admin Dashboard')
@section('admin')


<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <div class="card mb-4">

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <td>S/N</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>created At</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
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


                </tbody>
            </table>
        </div>
    </div>

</div>


@endsection