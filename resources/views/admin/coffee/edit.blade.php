@extends('layouts.master')

@section('title', 'View Coffies')

@section('content')
    <div class="container-fluid px-4">

        <div class="card mt-5 Big-Card">
            <div class="card-header Big-Title">
                <h4 class="d-flex flex-wrap justify-content-md-between justify-content-center gap-4 text-center"><b>Edit Coffee</b> 
                    <a href="{{ url('admin/coffee') }}" class="btn btn-light float-end" style="color:#FFC107;"><b>Back</b></a>

                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/update-coffee/' . $coffee->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Coffe Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $coffee->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ $coffee->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" rows="5" class="form-control">{{ $coffee->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div>
                        <button type="submit" name="Update" class="btn btn-warning text-white float-end"><b>Save</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
