@extends('layouts.admin')

@section('title')
    Ideatax | Create New Article
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Article</h2>
                <p class="dashboard-subtitle">Add New Article</p>
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
                                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12 mb-3">
                                            <label for="title" class="form-label">Article Title Id</label>
                                            <input type="text" id="title" name="title" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="title_eng" class="form-label">Article Title Eng</label>
                                            <input type="text" id="title_eng" name="title_eng" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="SEO_title" class="form-label">SEO Title Id</label>
                                            <input type="text" id="SEO_title" name="SEO_title" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="SEO_title_eng" class="form-label">SEO Title Eng</label>
                                            <input type="text" id="SEO_title_eng" name="SEO_title_eng" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="article_categories_id" class="form-label">Select Category</label>
                                            <select name="article_categories_id" class="form-select">
                                                @foreach ($articleCategories as $articleCategory)
                                                    <option value="{{ $articleCategory->id }}">{{ $articleCategory->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="photo" class="form-label">Article Thumbnail</label>
                                            <img class="img-preview img-fluid col-sm-5 my-2">
                                            <input type="file" id="photo" name="photo" class="form-control w-100" onchange="previewImage()" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="author_id" class="form-label">Select Author</label>
                                            <select name="author_id" class="form-select">
                                                <option value="">Select Author</option>
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="body">Article Body Id</label>
                                            <textarea name="body" id="editor"></textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="body_eng">Article Body Eng</label>
                                            <textarea name="body_eng" id="editor2"></textarea>
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
                                            <button type="submit" class="btn btn-warning d-block w-100">Post Article</button>
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
        CKEDITOR.replace('editor2');
    </script>
    <script>
        function previewImage() {
            const imgPreview = document.querySelector(".img-preview");

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            console.log(oFReader);
            oFReader.readAsDataURL(photo.files[0]);

            oFReader.onload = (oFREvent) => {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
