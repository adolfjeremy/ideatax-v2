@extends('layouts.admin')

@section('title')
    Ideatax | Create New Admin Account
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin</h2>
                <p class="dashboard-subtitle">Create New Account</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <form method="POST" action="{{ route('user.store') }}" class="mt-3 w-100">
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
                                        <div class="col-12 mb-3">
                                            <label for="roles" class="form-label">Select Category</label>
                                            <select name="roles" class="form-select">
                                                <option value="ADMIN">ADMIN</option>
                                                <option value="SUPER_ADMIN">SUPER ADMIN</option>
                                            </select>
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
                                        <button type="submit" class="btn btn-warning btn-block mt-2 w-100">Create Account</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
