@extends('layouts.admin')

@section('title')
    Ideatax | Edit Category
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">News Category</h2>
                <p class="dashboard-subtitle">Edit News Category</p>
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
                                    <form action="{{ route('category.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                        @method("PUT")
                                        @csrf
                                        <div class="col-12 mb-3">
                                            <label for="Name" class="form-label">News Category Title</label>
                                            <input type="text" id="title" name="title" class="form-control w-100" value="{{ $item->title }}" required>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning d-block w-100">Save News Category</button>
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
