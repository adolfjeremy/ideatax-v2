@extends('layouts.admin')

@section('title')
    Ideatax | Create New Service
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Services</h2>
                <p class="dashboard-subtitle">Add New Service</p>
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
                                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12 mb-3">
                                            <label for="Name" class="form-label">Service Name</label>
                                            <input type="text" id="title" name="title" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="editor"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning d-block w-100">Post Services</button>
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

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
