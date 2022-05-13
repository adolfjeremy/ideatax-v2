@extends('layouts.admin')

@section('title')
    Ideatax | Create New Tax Event
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Tax Event</h2>
                <p class="dashboard-subtitle">Add New Tax Event</p>
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
                                    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12 mb-3">
                                            <label for="Name" class="form-label">Tax Event Title</label>
                                            <input type="text" id="title" name="title" class="form-control w-100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="photo" class="form-label">Tax Event Thumbnail</label>
                                            <img class="img-preview img-fluid col-sm-5 my-2">
                                            <input type="file" id="photo" name="photo" class="form-control w-100" onchange="previewImage()">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="body">Tax Event Body</label>
                                            <textarea name="body" id="editor"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning d-block w-100">Post Tax Event</button>
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
