@extends('layouts.admin')

@section('title')
    Ideatax | Add New Team Member
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Team</h2>
                <p class="dashboard-subtitle">Add New Team Member</p>
            </div>
            <div class="dashboard-content pb-3 mt-2">
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
                            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" id="position" name="position" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" class="form-control w-100">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="text" id="linkedin" name="linkedin" class="form-control w-100">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <img class="img-preview img-fluid col-sm-5 my-2">
                                    <input type="file" id="photo" name="photo" class="form-control w-100" onchange="previewImage()" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="profile_picture" class="form-label">Profile Picture</label>
                                    <img class="img-preview img-fluid col-sm-5 my-2">
                                    <input type="file" id="profile_picture" name="profile_picture" class="form-control w-100" onchange="previewImage()" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="biography">Biography Id</label>
                                    <textarea name="biography" id="editor"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="biography_eng">Biography Eng</label>
                                    <textarea name="biography_eng" id="editor3"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="biography_jpn">Biography Jpn</label>
                                    <textarea name="biography_jpn" id="editor5"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="area_of_expertise">Area Of Expertise Id</label>
                                    <textarea name="area_of_expertise" id="editor2"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="area_of_expertise_eng">Area Of Expertise Eng</label>
                                    <textarea name="area_of_expertise_eng" id="editor4"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="area_of_expertise_jpn">Area Of Expertise Jpn</label>
                                    <textarea name="area_of_expertise_jpn" id="editor6"></textarea>
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
                                    <label for="SEO_title_jpn" class="form-label">SEO Title Jpn</label>
                                    <input type="text" id="SEO_title_jpn" name="SEO_title_jpn" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label">Meta Description Id</label>
                                    <textarea name="description" id="description" class="form-control w-100" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_eng" class="form-label">Meta Description Eng</label>
                                    <textarea name="description_eng" id="description_eng" class="form-control w-100" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_jpn" class="form-label">Meta Description Jpn</label>
                                    <textarea name="description_jpn" id="description_jpn" class="form-control w-100" cols="30" rows="5" required></textarea>
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
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor',{versionCheck: false,});

        CKEDITOR.replace('editor2',{versionCheck: false,});
        
        CKEDITOR.replace('editor3',{versionCheck: false,});

        CKEDITOR.replace('editor4',{versionCheck: false,});

        CKEDITOR.replace('editor5',{versionCheck: false,});

        CKEDITOR.replace('editor6',{versionCheck: false,});

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
