@extends('layouts.master')

@section('title', 'Add Coffee')

@section('content')
    <div class="container-fluid px-4">

        <div class="card mt-5">
            <div class="card-header">
                <h4 style="color:#ffc107;"><b>Add Coffee</b> 
                    <a href="{{ url('admin/coffee') }}" class="btn btn-warning text-white float-end"><b>Back</b></a>
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
                <form action="{{ url('admin/add-coffee') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Coffe Name</label>
                        <input type="text" name="name" class="form-control" style="border-bottom: 4px solid #ffc107">
                    </div>
                    <div class="mb-3">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control" style="border-bottom: 4px solid #ffc107">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" id="your_summernote" rows="5" class="form-control" style="border-bottom: 4px solid #ffc107"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" style="border: 4px solid #ffc107">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning float-end text-white"><b>Save</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
