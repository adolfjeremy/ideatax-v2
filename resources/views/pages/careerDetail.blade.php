@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/careers.css">
@endsection

@section('content')
    <section class="career_page">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center heading">
                    <h1>{{ $career->title }}</h1>
                </div>
            </div>
            <div class="row career-detail mt-4">
                <div class="col-12 col-lg-7">
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ __('careers.desc') }}</h2>
                            <div>{!! $career->jobdesc !!}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ __('careers.quali') }}</h2>
                            <div>{!! $career->qualification !!}</div>
                        </div>
                    </div>
                    @if ($career->skill)
                        <div class="row">
                            <div class="col-12">
                                <h2>{{ __('careers.skill') }}</h2>
                                <div>{!! $career->skill !!}</div>
                            </div>
                        </div>
                    @endif
                    @if ($career->course)
                        <div class="row">
                            <div class="col-12">
                                <h2>{{ __('careers.course') }}</h2>
                                <div>{!! $career->course !!}</div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-lg-5">
                    <div class="row gap-2">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h2>{{ __('careers.apply') }}</h2>
                        </div>
                        <div class="col-12 px-4">
                            <form class="apply-form" action="{{ route('update-save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="col-12 my-3">
                                    <input type="text" id="name" name="name" class="form-control w-100" placeholder="{{ __('careers.formname') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" id="email" name="email" class="form-control w-100" placeholder="Email*" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" id="phone" name="phone" class="form-control w-100" placeholder="{{ __('careers.formphone') }}" required>
                                </div>
                                <div class="col-12 mb-3 d-flex flex-column">
                                    <textarea name="question" id="editor" class="form-control w-100" rows="5" placeholder="Cover Letter*" required></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="cv" class="mb-2">Upload CV/Resume*</label>
                                    <input type="file" id="cv" name="cv" class="form-control w-100" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-warning d-block w-100">{{ __('home.askButton') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection