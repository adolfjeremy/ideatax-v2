@extends('layouts.admin')

@section('title')
    Ideatax | Edit Team
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Our Team</h2>
                <p class="dashboard-subtitle">Edit {{ $item ->name }}</p>
            </div>
            <div class="dashboard-content pb-3 mt-3">
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
                            <form action="{{ route('team.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="col-12 mb-2">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control w-100" value="{{ $item->name }}" required>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" id="position" name="position" class="form-control w-100" value="{{ $item->position }}" required>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" class="form-control w-100"  value="{{ $item->phone }}">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control w-100" value="{{ $item->email }}" required>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="text" id="linkedin" name="linkedin" class="form-control w-100" value="{{ $item->linkedin }}">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="photo" class="form-label">Photo</label>
                                    @if ($item->photo)
                                        <img src="{{ asset("storage/" . $item->photo) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                    @else
                                        <img class="img-preview img-fluid col-sm-5">
                                    @endif
                                    <input type="hidden" name="oldImage" value="{{ $item->photo }}">
                                    <input type="file" id="photo" name="photo" class="form-control w-100" value="{{ $item->photo }}" onchange="previewImage()">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="profile_picture" class="form-label">Profile Picture</label>
                                    @if ($item->profile_picture)
                                        <img src="{{ asset("storage/" . $item->profile_picture) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                    @else
                                        <img class="img-preview img-fluid col-sm-5 col-md-1">
                                    @endif
                                    <input type="hidden" name="oldPp" value="{{ $item->profile_picture }}">
                                    <input type="file" id="profile_picture" name="profile_picture" class="form-control w-100" value="{{ $item->profile_picture }}" onchange="previewImage()">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="biography">Biography Id</label>
                                    <textarea name="biography" id="editor">{!! $item->biography !!}</textarea>
                                </div><div class="col-12 mb-2">
                                    <label for="biography_eng">Biography Eng</label>
                                    <textarea name="biography_eng" id="editor3">{!! $item->biography_eng !!}</textarea>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="area_of_expertise">Area of Expertise Id</label>
                                    <textarea name="area_of_expertise" id="editor2">{!! $item->area_of_expertise !!}</textarea>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="area_of_expertise_eng">Area of Expertise Eng</label>
                                    <textarea name="area_of_expertise_eng" id="editor4">{!! $item->area_of_expertise_eng !!}</textarea>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="SEO_title" class="form-label">SEO Title Id</label>
                                    <input type="text" id="SEO_title" name="SEO_title" class="form-control w-100" value="{{ $item->SEO_title }}" required>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="SEO_title_eng" class="form-label">SEO Title Eng</label>
                                    <input type="text" id="SEO_title_eng" name="SEO_title_eng" class="form-control w-100" value="{{ $item->SEO_title_eng }}" required>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="description" class="form-label">Meta Description Id</label>
                                    <textarea name="description" id="description" class="form-control w-100" cols="30" rows="5" required>{{ $item->description }}</textarea>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="description_eng" class="form-label">Meta Description Eng</label>
                                    <textarea name="description_eng" id="description_eng" class="form-control w-100" cols="30" rows="5" required>{{ $item->description_eng }}</textarea>
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
    <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor',{versionCheck: false,});
        CKEDITOR.replace('editor2',{versionCheck: false,});
        CKEDITOR.replace('editor3',{versionCheck: false,});
        CKEDITOR.replace('editor4',{versionCheck: false,});
    </script>
@endpush
