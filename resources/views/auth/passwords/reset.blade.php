@extends('layouts.app')

@section('title','GimeCoffe | Reset')

@section('content')
    <div class="container" style="margin-top:200px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card Big-Card">
                    <div class="card-header Big-Title text-center fs-2"><b>{{ __('Reset Password') }}</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3 ">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        style="box-shadow: none;" onfocus="this.style.boxShadow='0 0 10px #FFC107'"
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
                                        required autocomplete="new-password" style="box-shadow: none;"
                                        onfocus="this.style.boxShadow='0 0 10px #FFC107'"
                                        onblur="this.style.boxShadow='none'">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required
                                        autocomplete="new-password"style="box-shadow: none;"
                                        onfocus="this.style.boxShadow='0 0 10px #FFC107'"
                                        onblur="this.style.boxShadow='none'">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn text-white" style="background-color: #FFC107">
                                        <b>{{ __('Reset Password') }}</b>
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
