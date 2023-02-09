@extends('layouts.master')

@section('title', 'View Coffies')

@section('content')
    <div class="container-fluid px-4">

        <div class="crad mt-4">

            <div class="card-header bg-white">
                <h4><b class="text-black">View Coffies</b>
                    <a href="{{ url('admin/add-coffee') }}" class="btn btn-warning text-white float-end"><b> Add
                            Coffee</b></a>
                </h4>
            </div>
            <div class="card-body bg-white">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table id="myTable" class="table table-striped bg-white" style="width:100%">
                    <thead class="bg-white">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coffies as $coffee)
                            <tr>
                                <td>{{ $coffee->id }}</td>
                                <td>{{ $coffee->name }}</td>
                                <td>{{ $coffee->price }}</td>
                                <td>
                                    <img src="{{ asset('uploads/coffee/' . $coffee->image) }}" alt="Img" width="50px"
                                        height="50px">
                                </td>
                                <td>
                                    <a href="{{ url('admin/edit-coffee/' . $coffee->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/delete-coffee/' . $coffee->id) }}"
                                        class="btn btn-danger delete-button"
                                        onclick=" return confirm('Are you sure you want to delete this item?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
