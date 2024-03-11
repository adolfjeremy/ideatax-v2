@extends('layouts.admin')

@section('title')
    Ideatax | Create New Service
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Services</h2>
                <p class="dashboard-subtitle">Add New Service</p>
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
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="title" class="form-label">Service Name Id</label>
                                    <input type="text" id="title" name="title" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title_eng" class="form-label">Service Name Eng</label>
                                    <input type="text" id="title_eng" name="title_eng" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="image" class="form-label">Service Thumbnail</label>
                                    <img class="img-preview img-fluid col-sm-5 my-2">
                                    <input type="file" id="image" name="image" class="form-control w-100" onchange="previewImage()" required>
                                </div>
                                <div class="col-12 mb-3 d-flex flex-column">
                                    <label for="description">Description Id</label>
                                    <textarea name="description" rows="10" required></textarea>
                                </div>
                                <div class="col-12 mb-3 d-flex flex-column">
                                    <label for="description_eng">Description Eng</label>
                                    <textarea name="description_eng" rows="10" required></textarea>
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
                                    <label for="description" class="form-label">Meta Description Id</label>
                                    <textarea name="description" id="description" class="form-control w-100" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_eng" class="form-label">Meta Description Eng</label>
                                    <textarea name="description_eng" id="description_eng" class="form-control w-100" cols="30" rows="5" required></textarea>
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
    </section>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
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
