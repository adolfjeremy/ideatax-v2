@extends('layouts.admin')

@section('title')
    Ideatax | Edit Job Opening
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Hero</h2>
                <p class="dashboard-subtitle">Edit Hero Section</p>
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
                            <form action="{{ route('hero.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="cta" class="form-label">Tag Line</label>
                                    <input type="text" id="cta" name="cta" class="form-control w-100" value="{{ $item->cta }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="cta" class="form-label">Tag Line Eng</label>
                                    <input type="text" id="cta" name="cta" class="form-control w-100" value="{{ $item->cta_eng }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="button" class="form-label">Button</label>
                                    <input type="text" id="button" name="button" class="form-control w-100" value="{{ $item->button }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="button" class="form-label">Button Eng</label>
                                    <input type="text" id="button" name="button" class="form-control w-100" value="{{ $item->button_eng }}" required>
                                <div class="col-12 mb-3">
                                    <label for="photo" class="form-label">Hero Image</label>
                                    @if ($item->hero)
                                    <img src="{{ asset("storage/" . $item->hero) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                    @else
                                    <img class="img-preview img-fluid col-sm-5 my-2">
                                    @endif
                                    <input type="hidden" name="oldImage" value="{{ $item->hero }}">
                                    <input type="file" id="hero" name="hero" class="form-control w-100" value="{{ $item->hero }}" onchange="previewImage()">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Save</button>
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
