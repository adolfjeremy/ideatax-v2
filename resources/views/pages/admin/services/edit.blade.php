@extends('layouts.admin')

@section('title')
    Ideatax | Edit Service
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Services</h2>
                <p class="dashboard-subtitle">Edit Your Service</p>
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
                            <form action="{{ route('services.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <input type="hidden" name="currentOrder" class="form-control w-100" value="{{ $item->order }}" required>
                                <div class="col-12 mb-3">
                                    <label for="order" class="form-label">No</label>
                                    <input type="text" id="order" name="order" class="form-control w-100" value="{{ $item->order }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title" class="form-label">Service Name Id</label>
                                    <input type="text" id="title" name="title" class="form-control w-100" value="{{ $item->title }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title_eng" class="form-label">Service Name Eng</label>
                                    <input type="text" id="title_eng" name="title_eng" class="form-control w-100" value="{{ $item->title_eng }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title_jpn" class="form-label">Service Name Jpn</label>
                                    <input type="text" id="title_jpn" name="title_jpn" class="form-control w-100" value="{{ $item->title_jpn }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="image" class="form-label">Service Thumbnail</label>
                                    @if ($item->image)
                                        <img src="{{ asset("storage/" . $item->image) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                    @else
                                        <img class="img-preview img-fluid col-sm-5 my-2">
                                    @endif
                                    <input type="hidden" name="oldImage" value="{{ $item->image }}">
                                    <input type="file" id="image" name="image" class="form-control w-100" value="{{ $item->image }}" onchange="previewImage()">
                                </div>
                                <div class="col-12 mb-3 d-flex flex-column">
                                    <label for="description">Description Id</label>
                                    <textarea name="description" rows="10" required>{{ $item->description }}</textarea>
                                </div>
                                <div class="col-12 mb-3 d-flex flex-column">
                                    <label for="description_eng">Description Eng</label>
                                    <textarea name="description_eng" rows="10" required>{{ $item->description_eng }}</textarea>
                                </div>
                                <div class="col-12 mb-3 d-flex flex-column">
                                    <label for="description_jpn">Description Jpn</label>
                                    <textarea name="description_jpn" rows="10" required>{{ $item->description_jpn }}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title" class="form-label">SEO Title Id</label>
                                    <input type="text" id="SEO_title" name="SEO_title" class="form-control w-100" value="{{ $item->SEO_title }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title_eng" class="form-label">SEO Title Eng</label>
                                    <input type="text" id="SEO_title_eng" name="SEO_title_eng" class="form-control w-100" value="{{ $item->SEO_title_eng }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title_jpn" class="form-label">SEO Title Jpn</label>
                                    <input type="text" id="SEO_title_jpn" name="SEO_title_jpn" class="form-control w-100" value="{{ $item->SEO_title_jpn }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="meta_description" class="form-label">Meta Description Id</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control w-100" cols="30" rows="5" required>{{ $item->meta_description }}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="meta_description_eng" class="form-label">Meta Description Eng</label>
                                    <textarea name="meta_description_eng" id="meta_description_eng" class="form-control w-100" cols="30" rows="5" required>{{ $item->meta_description_eng }}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="meta_description_jpn" class="form-label">Meta Description Jpn</label>
                                    <textarea name="meta_description_jpn" id="meta_description_jpn" class="form-control w-100" cols="30" rows="5" required>{{ $item->meta_description_jpn }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Save Service</button>
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
