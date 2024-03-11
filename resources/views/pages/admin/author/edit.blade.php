@extends('layouts.admin')

@section('title')
    Ideatax | Edit Author
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Author</h2>
                <p class="dashboard-subtitle">Edit Author</p>
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
                            <form action="{{ route('author.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="name" class="form-label">Author Name</label>
                                    <input type="text" id="name" name="name" class="form-control w-100" value="{{ $item->name }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" id="position" name="position" class="form-control w-100" value="{{ $item->position }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control w-100" value="{{ $item->email }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="photo" class="form-label">Image</label>
                                    @if ($item->image)
                                        <img src="{{ asset("storage/" . $item->image) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                    @else
                                        <img class="img-preview img-fluid col-sm-5 my-2">
                                    @endif
                                    <input type="hidden" name="oldImage" value="{{ $item->image }}">
                                    <input type="file" id="image" name="image" accept="image/*" class="form-control w-100" onchange="previewImage()">
                                    <small>max size: 200kb</small>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Save Author</button>
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
            console.log(oFReader);
            oFReader.readAsDataURL(photo.files[0]);

            oFReader.onload = (oFREvent) => {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
