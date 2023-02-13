@extends('layouts.master')

@section('title', 'View Coffies')

@section('content')
    <div class="container-fluid px-4">

        <div class="crad mt-4 Big-Card">

            <div class="card-header Big-Title">
                <h4 class="d-flex flex-wrap justify-content-md-between justify-content-center gap-4"><b class="">View Coffies</b>
                    <a href="{{ url('admin/add-coffee') }}" class="btn btn-light float-end" style="color:#FFC107;"><b> Add
                            Coffee</b></a>
                </h4>
            </div>
            <div class="card-body bg-white" style="height:600px; overflow-x: scroll; overflow-y:scroll">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table id="myTable" class="table table-striped bg-white">
                    <thead class="bg-white">
                        <tr class="tablerow">
                            <th class="tablerow">ID</th>
                            <th class="tablerow">Name</th>
                            <th class="tablerow">Price</th>
                            <th class="tablerow">Image</th>
                            <th class="tablerow">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coffies as $coffee)
                            <tr class="tablerow">
                                <td>{{ $coffee->id }}</td>
                                <td>{{ $coffee->name }}</td>
                                <td>{{ $coffee->price }}</td>
                                <td>
                                    <img src="{{ asset('uploads/coffee/' . $coffee->image) }}" alt="Img" width="50px"
                                        height="50px">
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-2 h-100 justify-content-center">
                                        <a href="{{ url('admin/edit-coffee/' . $coffee->id) }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ url('admin/delete-coffee/' . $coffee->id) }}"
                                            class="btn btn-danger delete-button"
                                            onclick=" return confirm('Are you sure you want to delete this item?')">Delete</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
