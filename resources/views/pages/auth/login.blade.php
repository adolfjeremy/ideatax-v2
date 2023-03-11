@extends('layouts.auth')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/3.css">
    <link rel="stylesheet" href="/assets/css/pages/admin.css">
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
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}" class="mt-3 w-100">
                        @csrf
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            <button type="submit" class="btn btn-warning btn-block mt-2 w-100">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
