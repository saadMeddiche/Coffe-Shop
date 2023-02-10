@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-white">Dashboard</h1>

        <div class="row">
            <div class="col-xl-3 col-md-2">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total Of Coffies
                        <h2>{{ $NumOfCoffies }}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ url('admin/coffee') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-2">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Total Of Users
                        <h2>{{ $NumOfUsers }}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ url('admin/users') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
