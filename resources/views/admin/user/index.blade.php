@extends('layouts.master')

@section('title', 'View Users')

@section('content')
    <div class="container-fluid px-4">

        <div class="crad mt-4 Big-Card">

            <div class="card-header Big-Title text-center">
                <h4 class="mb-0"><b>View Users</b></h4>
            </div>

            <div class="card-body bg-white" style="max-height:600px; overflow-x: scroll; overflow-y:scroll ">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table id="myTable" class="table table-bordered bg-white">
                    
                    <thead class="bg-white">
                        <tr class="tablerow">
                            <th class="tablerow">ID</th>
                            <th class="tablerow">UserName</th>
                            <th class="tablerow">Email</th>
                            <th class="tablerow">Role</th>
                            @if (Auth::user()->role_as == '1')
                                <th class="tablerow">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="tablerow">
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
