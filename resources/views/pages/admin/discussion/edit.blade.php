@extends('layouts.admin')

@section('title')
    Ideatax | Answer {{ $item->name }} Question
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Question</h2>
                <p class="dashboard-subtitle">Answer {{ $item->name }} Question</p>
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
                                    <form action="{{ route('discussion.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                        @method("PUT")
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-lg-4 mb-3">
                                                <label for="name" class="form-label">Customer Name</label>
                                                <input type="text" id="name" name="name" class="form-control w-100" value="{{ $item->name }}" required>
                                            </div>
                                            <div class="col-12 col-lg-4 mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control w-100" value="{{ $item->email }}" required>
                                            </div>
                                            <div class="col-12 col-lg-4 mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" class="form-select">
                                                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                                                    @if ($item->status === "UNANSWERED")
                                                        <option value="ANSWERED">ANSWERED</option>
                                                    @else
                                                        <option value="UNANSWERED">UNANSWERED</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 mb-3">
                                            <label for="question">Question Id</label>
                                            <textarea name="question" id="question" class="form-control w-100" style="height: 170px">{!! $item->question !!}</textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="question_eng">Question Eng</label>
                                            <textarea name="question_eng" id="question_eng" class="form-control w-100" style="height: 170px">{!! $item->question_eng !!}</textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="title" class="form-label">Post Title Id</label>
                                            <input type="text" id="title" name="title" class="form-control w-100" value="{{ $item->title }}" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="title_e g" class="form-label">Post Title Eng</label>
                                            <input type="text" id="title_eng" name="title_eng" class="form-control w-100" value="{{ $item->title_eng }}" required>
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
                                            <label for="photo" class="form-label">Thumbnail</label>
                                            @if ($item->photo)
                                                <img src="{{ asset("storage/" . $item->photo) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                            @else
                                                <img class="img-preview img-fluid col-sm-5 my-2">
                                            @endif
                                            <input type="hidden" name="oldImage" value="{{ $item->photo }}">
                                            <input type="file" id="photo" name="photo" class="form-control w-100" value="{{ $item->photo }}" onchange="previewImage()">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="answer">Answer Id</label>
                                            <textarea name="answer" id="answer">{!! $item->answer !!}</textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="answer_eng">Answer Eng</label>
                                            <textarea name="answer_eng" id="answer_eng">{!! $item->answer_eng !!}</textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="seo_title" class="form-label">SEO Title Id</label>
                                            <input type="text" id="seo_title" name="seo_title" class="form-control w-100" value="{{ $item->seo_title }}" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="seo_title_eng" class="form-label">SEO Title Eng</label>
                                            <input type="text" id="seo_title_eng" name="seo_title_eng" class="form-control w-100" value="{{ $item->seo_title_eng }}" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="description" class="form-label">Meta Description Id</label>
                                            <textarea name="description" id="description" class="form-control w-100" cols="30" rows="5" required>{{ $item->description }}</textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="description_eng" class="form-label">Meta Description Eng</label>
                                            <textarea name="description_eng" id="description_eng" class="form-control w-100" cols="30" rows="5" required>{{ $item->description_eng }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning d-block w-100">Post Answer</button>
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
        CKEDITOR.replace('answer',{versionCheck: false,});
        CKEDITOR.replace('answer_eng',{versionCheck: false,});
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
