@extends('layouts.app')

@section('title', 'GiMeCoffee | Menu')

@section('content')


    <div class="container-fluid bg-trasparent my-4 p-3 " style="position: relative;">
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            @foreach ($coffies as $coffee)
                <div class="col">
                    <div class="card h-100 shadow-sm" style="border:4px solid brown;">
                        <img src="uploads/coffee/{{ $coffee->image }}" class="card-img-top" alt="..."
                            style="border-bottom:4px solid brown;">
                        <div class="card-body">
                            <div class="clearfix mb-3"> <span class="float-start badge rounded-pill"
                                    style="background-color:brown;"
                                    id="rfbtgn{{ $coffee->id }}">{{ $coffee->name }}</span>
                                <span class="float-end price-hp">{{ $coffee->price }}&euro;</span>
                            </div>
                            <input type="hidden" value="{{ $coffee->description }}" id="qsdfgh{{ $coffee->id }}">
                            <div class="text-center my-4"> <a class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    onclick="document.getElementById('description').innerHTML=document.getElementById('qsdfgh{{ $coffee->id }}').value;document.getElementById('exampleModalLabel').innerHTML=document.getElementById('rfbtgn{{ $coffee->id }}').innerHTML;">
                                    Check
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- <img src="https://www.freepnglogos.com/uploads/coffee-png/coffee-png-transparent-images-png-only-28.png"
        class="card-img-top" alt="..."> --}}
    @include('layouts.inc.model')

@endsection
