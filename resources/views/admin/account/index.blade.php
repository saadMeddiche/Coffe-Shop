@extends('layouts.master')

@section('title', 'Edit Account')

@section('content')
    <div class="container-fluid px-4">

        <div class="card mt-5 Big-Card">
            <div class="card-header Big-Title">
                <h4>Edit Account
                    <a href="{{ url('admin/users') }}" class="btn btn-light float-end" style="color:#FFC107;"><b>Back</b></a>
                </h4>
            </div>
            <form action="{{ url('admin/update-account') }}" method="post" class="mb-2">
                @csrf
                @method('PUT')

                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="card-body">

                    <div class="mb-3">
                        <label for="">UserName</label>
                        <input class="form-control" value="{{ Auth::user()->name }}" name="username">
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input class="form-control" value="{{ Auth::user()->email }}" name="email">
                    </div>

                    <div class="mb-3 AfterMod" id="account-password">
                        <label for="">Password</label>
                        <input class="form-control fw-bold" value="********">
                    </div>

                    <div class="mb-3 account-hide pass_show AfterMod" id="account-1">
                        <label for="">Current Password</label>
                        <input class="form-control clear" type="password" value="" name="current-password">
                    </div>

                    <div class="mb-3 account-hide pass_show AfterMod" id="account-3">
                        <label for="">New Password</label>
                        <input class="form-control clear" type="password" value="" name="new-password">
                    </div>

                    <div class="mb-3 account-hide pass_show AfterMod" id="account-2">
                        <label for="">Repeat Password</label>
                        <input class="form-control clear" type="password" value="" name="repeat-password">
                    </div>

                    {{-- How to prevent buttons from causing a form to submit with HTML --}}
                    {{-- https://gomakethings.com/how-to-prevent-buttons-from-causing-a-form-to-submit-with-html/ --}}
                    <div class="w-100">
                        <button class="btn btn-warning text-white fw-bold float-start account-hide AfterMod" id="account-4"
                            onclick="event.preventDefault(); Appear1();">Cancel</button>
                        <button class="btn btn-warning text-white fw-bold float-end account-hide AfterMod"
                            id="account-5">Update</button>
                        <button class="btn btn-warning text-white fw-bold float-end AfterMod"
                            onclick="event.preventDefault(); Appear1();" id="account-Modification">Modification</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
