@extends('layouts.admin')

@section('title')
    Ideatax | Create Promotions
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Promotions</h2>
                <p class="dashboard-subtitle">Add New Promotion</p>
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
                            <form action="{{ route('promo.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title_eng" class="form-label">Title En</label>
                                    <input type="text" id="title_eng" name="title_eng" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="excerpt" class="form-label">Description</label>
                                    <input type="text" id="excerpt" name="excerpt" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="excerpt_eng" class="form-label">Description En</label>
                                    <input type="text" id="excerpt_eng" name="excerpt_eng" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <img class="img-preview img-fluid col-sm-5 my-2">
                                    <input type="file" id="image" name="image" accept="image/*" class="form-control w-100" onchange="previewImage()" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Save Promotion</button>
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
    <script>
        function previewImage() {
            const imgPreview = document.querySelector(".img-preview");

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = (oFREvent) => {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush