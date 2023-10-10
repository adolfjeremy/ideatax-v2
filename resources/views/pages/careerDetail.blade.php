@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/careers/{{ $career->slug }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/careers.css">
@endsection

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $career->description_eng }}">
        <meta property="og:description" content="{{ $career->description_eng }}">
        <meta property="og:title" content="{{ $career->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $career->description }}">
        <meta property="og:description" content="{{ $career->description }}">
        <meta property="og:title" content="{{ $career->SEO_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/articles/{{ $career->slug }}">
    <meta property="og:type" content="article">
@endsection


@section('title')
    @if (app()->getLocale() == "en")
        {{ $career->title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $career->title }}
    @endif
@endsection

@section('content')
    <section class="career_page">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center heading">
                    <h1>{{ $career->title }}</h1>
                </div>
            </div>
            <div class="row career-detail mt-4 mb-4">
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
                        </div>
                        <div class="col-12 px-4">
                            @if(session()->has('successAlert'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('successAlert')}}
                                </div>
                            @endif 
                            <form class="apply-form" action="{{ route('careers-post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                
                                <input type="hidden" id="career_id" name="career_id" value="{{ $career->id }}">
                                <div class="col-12 my-3">
                                    <input type="text" id="name" name="name" class="form-control w-100" placeholder="{{ __('careers.formname') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" id="email" name="email" class="form-control w-100" placeholder="Email*" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" id="phone" name="phone" class="form-control w-100" placeholder="{{ __('careers.formphone') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="coverLetter" id="coverLetter" class="form-control w-100" rows="5" placeholder="Cover Letter*" required></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="cv" class="mb-2">Upload CV/Resume*</label>
                                    <input type="file" id="resume" name="resume" class="form-control w-100" accept="application/pdf" required>
                                    <div class="form_validation d-flex flex-column">
                                        <small>allowed type: pdf</small>
                                        <small>max size: 200kb</small>
                                    </div>
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