@extends('layouts.app')

@section('title', 'Menu')

@section('content')

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    <div class="container-fluid bg-trasparent my-4 p-3 bg-black" style="position: relative;">
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            <div class="col">
                <div class="card h-100 shadow-sm"> <img
                        src="https://www.freepnglogos.com/uploads/coffee-png/coffee-png-transparent-images-png-only-31.png"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="clearfix mb-3"> <span class="float-start badge rounded-pill"
                                style="background-color:brown;">Cappuccino</span>
                            <span class="float-end price-hp">12354.00&euro;</span>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Veniam quidem eaque ut eveniet aut quis rerum. Asperiores
                            accusamus harum ducimus velit odit ut. Saepe, iste optio laudantium sed
                            aliquam sequi.</h5>
                        <div class="text-center my-4"> <a href="#" class="btn btn-warning">Check
                                offer</a> </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm"> <img
                        src="https://www.freepnglogos.com/uploads/coffee-png/coffee-png-transparent-images-png-only-28.png"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="clearfix mb-3"> <span class="float-start badge rounded-pill"
                                style="background-color:brown;">Americano</span>
                            <span class="float-end price-hp">12354.00&euro;</span>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Veniam quidem eaque ut eveniet aut quis rerum. Asperiores
                            accusamus harum ducimus velit odit ut. Saepe, iste optio laudantium sed
                            aliquam sequi.</h5>
                        <div class="text-center my-4"> <a href="#" class="btn btn-warning">Check
                                offer</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
