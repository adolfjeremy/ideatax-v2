@extends('layouts.admin')

@section('title')
    Ideatax | Create New Author
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Author</h2>
                <p class="dashboard-subtitle">Add New Author</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach    
                            </ul>    
                        </div>                        
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12 mb-3">
                                            <label for="name" class="form-label">Author Name</label>
                                            <input type="text" id="name" name="name" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="position" class="form-label">Position</label>
                                            <input type="text" id="position" name="position" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3" >
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" id="image" name="image" accept="image/*" class="form-control w-100" required>
                                            <small>max size: 200kb</small>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning d-block w-100">Create Author</button>
                                        </div>
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
