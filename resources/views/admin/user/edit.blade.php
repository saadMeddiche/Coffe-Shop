@extends('layouts.master')

@section('title', 'View Coffies')

@section('content')
    <div class="container-fluid px-4">

        <div class="card mt-5 Big-Card">
            <div class="card-header Big-Title">
                <h4 class="m-0">Edit User
                    <a href="{{ url('admin/users') }}" class="btn btn-light float-end" style="color:#FFC107;"><b>Back</b></a>
                </h4>
            </div>
            <div class="card-body">

                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">UserName</label>
                    <p class="form-control">{{ $user->name }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <p class="form-control">{{ $user->email }}</p>
                </div>


                <form action="{{ url('admin/update-user/' . $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="">Role</label>
                        <select name="role_as" class="form-control">
                            <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning text-white float-end"><b>Update</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
