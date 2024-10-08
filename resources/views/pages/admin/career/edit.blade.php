@extends('layouts.admin')

@section('title')
    Ideatax | Edit Job Opening
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Career</h2>
                <p class="dashboard-subtitle">Edit Job Opening</p>
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
                            <form action="{{ route('career.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control w-100" value="{{ $item->title }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title_eng" class="form-label">Title Eng</label>
                                    <input type="text" id="title_eng" name="title_eng" class="form-control w-100" value="{{ $item->title_eng }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title_jpn" class="form-label">Title Jpn</label>
                                    <input type="text" id="title_jpn" name="title_jpn" class="form-control w-100" value="{{ $item->title_jpn }}" required>
                                </div>_eng
                                <div class="col-12 mb-3">
                                    <label for="SEO_title" class="form-label">SEO Title Id</label>
                                    <input type="text" id="SEO_title" name="SEO_title" class="form-control w-100" value="{{ $item->seo_title }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title_eng" class="form-label">SEO Title Eng</label>
                                    <input type="text" id="SEO_title_eng" name="SEO_title_eng" class="form-control w-100" value="{{ $item->seo_title_eng }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title_jpn" class="form-label">SEO Title Jpn</label>
                                    <input type="text" id="SEO_title_jpn" name="SEO_title_jpn" class="form-control w-100" value="{{ $item->seo_title_jpn }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="jobdesc">Job Description Id</label>
                                    <textarea name="jobdesc" id="jobdesc">{!! $item->jobdesc !!}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="body_eng">Job Description Eng</label>
                                    <textarea name="jobdesc_eng" id="jobdesc_eng">{!! $item->jobdesc_eng !!}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="jobdesc_eng">Job Description Jpn</label>
                                    <textarea name="jobdesc_jpn" id="jobdesc_jpn">{!! $item->jobdesc_jpn !!}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="qualification" class="form-label">Minimum Qualifications Id</label>
                                    <textarea name="qualification" id="qualification" class="form-control w-100" cols="20" rows="5" required>{!! $item->qualification !!}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="qualification_eng" class="form-label">Minimum Qualifications Eng</label>
                                    <textarea name="qualification_eng" id="qualification_eng" class="form-control w-100" cols="20" rows="5" required>
                                        {!! $item->qualification_eng !!}
                                    </textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="qualification_jpn" class="form-label">Minimum Qualifications Jpn</label>
                                    <textarea name="qualification_jpn" id="qualification_jpn" class="form-control w-100" cols="20" rows="5" required>
                                        {!! $item->qualification_jpn !!}
                                    </textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="skill" class="form-label">Required Skills Id</label>
                                    <textarea name="skill" id="skill" class="form-control w-100" cols="20" rows="5">{!! $item->skill !!}</textarea>
                                    <small>*leave blank if not necessary</small>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="skill_eng" class="form-label">Required Skills Eng</label>
                                    <textarea name="skill_eng" id="skill_eng" class="form-control w-100" cols="20" rows="5">{!! $item->skill_eng !!}</textarea>
                                    <small>*leave blank if not necessary</small>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="skill_jpn" class="form-label">Required Skills Jpn</label>
                                    <textarea name="skill_jpn" id="skill_jpn" class="form-control w-100" cols="20" rows="5">{!! $item->skill_jpn !!}</textarea>
                                    <small>*leave blank if not necessary</small>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="course" class="form-label">Preferred Courses Id</label>
                                    <textarea name="course" id="course" class="form-control w-100" cols="20" rows="5">{!! $item->course !!}</textarea>
                                    <small>*leave blank if not necessary</small>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="course_eng" class="form-label">Preferred Courses Eng</label>
                                    <textarea name="course_eng" id="course_eng" class="form-control w-100" cols="20" rows="5">{!! $item->course_eng !!}</textarea>
                                    <small>*leave blank if not necessary</small>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="course_jpn" class="form-label">Preferred Courses Jpn</label>
                                    <textarea name="course_jpn" id="course_jpn" class="form-control w-100" cols="20" rows="5">{!! $item->course_jpn !!}</textarea>
                                    <small>*leave blank if not necessary</small>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label">Meta Description Id</label>
                                    <textarea name="description" id="description" class="form-control w-100" cols="30" rows="5">
                                        {!! $item->description !!}
                                    </textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_eng" class="form-label">Meta Description Eng</label>
                                    <textarea name="description_eng" id="description_eng" class="form-control w-100" cols="30" rows="5">
                                        {!! $item->description_eng !!}
                                    </textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_jpn" class="form-label">Meta Description Jpn</label>
                                    <textarea name="description_jpn" id="description_jpn" class="form-control w-100" cols="30" rows="5">
                                        {!! $item->description_jpn !!}
                                    </textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Post</button>
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
        CKEDITOR.replace('jobdesc' ,{versionCheck: false,});
        CKEDITOR.replace('jobdesc_eng' ,{versionCheck: false,});
        CKEDITOR.replace('jobdesc_jpn' ,{versionCheck: false,});
        CKEDITOR.replace('qualification' ,{versionCheck: false,});
        CKEDITOR.replace('qualification_eng' ,{versionCheck: false,});
        CKEDITOR.replace('qualification_jpn' ,{versionCheck: false,});
        CKEDITOR.replace('skill' ,{versionCheck: false,});
        CKEDITOR.replace('skill_eng' ,{versionCheck: false,});
        CKEDITOR.replace('skill_jpn' ,{versionCheck: false,});
        CKEDITOR.replace('course' ,{versionCheck: false,});
        CKEDITOR.replace('course_eng' ,{versionCheck: false,});
        CKEDITOR.replace('course_jpn' ,{versionCheck: false,});
    </script>
@endpush
