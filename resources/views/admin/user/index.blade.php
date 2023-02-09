@extends('layouts.master')

@section('title', 'View Users')

@section('content')
    <div class="container-fluid px-4">

        <div class="crad mt-4">

            <div class="card-header bg-white">
                <h4><b class="text-black">View Users</b></h4>
            </div>
            <div class="card-body bg-white">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table id="myTable" class="table table-bordered bg-white">
                    <thead class="bg-white">
                        <tr>
                            <th>ID</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>Role</th>
                            @if (Auth::user()->role_as == '1')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role_as == '0' ? 'User' : 'Admin' }}</td>
                                @if (Auth::user()->role_as == '1')
                                    <td>
                                        <a href="{{ url('admin/user/' . $user->id) }}" class="btn btn-success">Edit</a>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
