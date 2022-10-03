@extends('layouts.admin')

@section('title')
    Ideatax | Edit Team
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Team</h2>
                <p class="dashboard-subtitle">Edit Team</p>
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
                                    <form action="{{ route('team.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                        @method("PUT")
                                        @csrf
                                        <div class="col-12 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="name" name="name" class="form-control w-100" value="{{ $item->name }}" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="position" class="form-label">Position</label>
                                            <input type="text" id="position" name="position" class="form-control w-100" value="{{ $item->position }}" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" id="phone" name="phone" class="form-control w-100"  value="{{ $item->phone }}">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email" class="form-control w-100" value="{{ $item->email }}" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="linkedin" class="form-label">LinkedIn</label>
                                            <input type="text" id="linkedin" name="linkedin" class="form-control w-100" value="{{ $item->linkedin }}">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="photo" class="form-label">Photo</label>
                                            @if ($item->photo)
                                                <img src="{{ asset("storage/" . $item->photo) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                            @else
                                                <img class="img-preview img-fluid col-sm-5 my-2">
                                            @endif
                                            <input type="hidden" name="oldImage" value="{{ $item->photo }}">
                                            <input type="file" id="photo" name="photo" class="form-control w-100" value="{{ $item->photo }}" onchange="previewImage()">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="profile_picture" class="form-label">Profile Picture</label>
                                            @if ($item->profile_picture)
                                                <img src="{{ asset("storage/" . $item->profile_picture) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                            @else
                                                <img class="img-preview img-fluid col-sm-5 my-2">
                                            @endif
                                            <input type="hidden" name="oldPp" value="{{ $item->profile_picture }}">
                                            <input type="file" id="profile_picture" name="profile_picture" class="form-control w-100" value="{{ $item->profile_picture }}" onchange="previewImage()">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="biography">Biography</label>
                                            <textarea name="biography" id="editor">{!! $item->biography !!}</textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="area_of_expertise">Area of Expertise</label>
                                            <textarea name="area_of_expertise" id="editor2">{!! $item->area_of_expertise !!}</textarea>
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
@endpush
