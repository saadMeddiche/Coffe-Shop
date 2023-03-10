@extends('layouts.app')
@section('title', 'GiMeCoffee | Login')
@section('content')
    <div class="container" style="margin-top:200px; height:70vh;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card Big-Card ">
                    <div class="card-header Big-Title text-center fs-2"><b>{{ __('Login') }}</b></div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-danger">{{ session('message') }}</div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" style="box-shadow: none;"
                                        onfocus="this.style.boxShadow='0 0 10px #FFC107'"
                                        onblur="this.style.boxShadow='none'">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" style="box-shadow: none;"
                                        onfocus="this.style.boxShadow='0 0 10px #FFC107'"
                                        onblur="this.style.boxShadow='none'">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4 d-flex flex-wrap text-center">
                                    <button type="submit" class="btn text-white" style="background-color: #FFC107">
                                        <b>{{ __('Login') }}</b>
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color:brown;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
