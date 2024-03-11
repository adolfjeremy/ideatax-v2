@extends('layouts.admin')

@section('title')
    Ideatax | Create New Article Category
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 pw-bold">Article Category</h2>
                <p class="dashboard-subtitle">Create Article Category</p>
            </div>
            <div class="dashboard-content pb-3 mt-4">
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
                        <div class="row d-flex justify-content-center">
                            <form action="{{ route('article-category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="Name" class="form-label">Article Category Title</label>
                                    <input type="text" id="title" name="title" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="seo_title" class="form-label">SEO Title Id</label>
                                    <input type="text" id="seo_title" name="seo_title" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="seo_title_eng" class="form-label">SEO Title Eng</label>
                                    <input type="text" id="seo_title_eng" name="seo_title_eng" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label">Meta Description Id</label>
                                    <textarea name="description" id="description" class="form-control w-100" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_eng" class="form-label">Meta Description Eng</label>
                                    <textarea name="description_eng" id="description_eng" class="form-control w-100" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Create Article Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
