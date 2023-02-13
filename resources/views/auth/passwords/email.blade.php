@extends('layouts.app')

@section('title','GiMeCoffee | Reset')

@section('content')
    <div class="container" style="margin-top:200px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card Big-Card">
                    <div class="card-header Big-Title fs-2 text-center"><b>{{ __('Reset Password') }}</b></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" style="box-shadow: none;" onfocus="this.style.boxShadow='0 0 10px #FFC107'"
                                        onblur="this.style.boxShadow='none'">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn text-white w-fit" style="background-color:#FFC107;">
                                        <b>{{ __('Send Password') }}</b>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
