@extends('layouts.admin')

@section('title')
    Ideatax | Edit Tax Update
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Tax Update</h2>
                <p class="dashboard-subtitle">Edit Your Tax Update</p>
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
                                    <form action="{{ route('update.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                        @method("PUT")
                                        @csrf
                                        <div class="col-12 mb-3">
                                            <label for="Name" class="form-label">Tax Update Title</label>
                                            <input type="text" id="title" name="title" class="form-control w-100" value="{{ $item->title }}" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="tax_update_categories_id" class="form-label">Select Category</label>
                                            <select name="tax_update_categories_id" class="form-select">
                                                @foreach ($taxUpdateCategories as $taxUpdateCategory)
                                                    <option value="{{ $taxUpdateCategory->id }}">{{ $taxUpdateCategory->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="photo" class="form-label">Tax update Thumbnail</label>
                                            @if ($item->photo)
                                                <img src="{{ asset("storage/" . $item->photo) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                            @else
                                                <img class="img-preview img-fluid col-sm-5 my-2">
                                            @endif
                                            <input type="hidden" name="oldImage" value="{{ $item->photo }}">
                                            <input type="file" id="photo" name="photo" class="form-control w-100" value="{{ $item->photo }}" onchange="previewImage()">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="body">Tax Update Body</label>
                                            <textarea name="body" id="editor">{!! $item->body !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning d-block w-100">Save Tax Update</button>
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
