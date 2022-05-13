@extends('layouts.auth')

@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/home.css">
@endsection

@section('title')
    Ideatax | Login
@endsection

@section('content')
    <section class="py-5 d-flex align-items-center justify-content-center mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 mt-4">
                    <div class="row text-center">
                        <h1>Idea<strong>tax</strong></h1>
                        <p>welcome to ideatax.id admin page</p>
                    </div>
                    <div class="row">
                        <form method="POST" action="{{ route('register') }}" class="mt-3 w-100">
                        @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control w-100 @error('name') is-invalid @endError" name="name" autocomplete="email" autofocus value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control w-100 @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning btn-block mt-2 w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
<div class="container" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
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
<section class="admin-auth py-5">
            <div class="container py-5">
                <div class="row py-1">
                    <div class="col-12 col-md-6 p-md-5 d-flex flex-column justify-content-center">
                        <h1 class="page-title">Idea<strong>tax</strong></h1>
                        <p>welcome to ideatax.id admin page</p>
                    </div>
                    <div class="col-12 col-md-6 p-md-5 d-flex flex-column justify-content-center">
                        <form method="POST" action="{{ route('login') }}" class="mt-3 w-100">
                        @csrf
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email address</label>
                                 <input id="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning btn-block mt-2 w-100">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
