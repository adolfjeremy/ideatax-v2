@extends('layouts.app')

@section('canonical')
@if (app()->getLocale() == "en")
    <link rel="canonical" href="https://ideatax.id/articles/{{ $article->slug_eng }}">
@endif
@if (app()->getLocale() == "id")
    <link rel="canonical" href="https://ideatax.id/articles/{{ $article->slug }}">
@endif

@endsection

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $article->description_eng }}">
        <meta property="og:description" content="{{ $article->description_eng }}">
        <meta property="og:title" content="{{ $article->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $article->description }}">
        <meta property="og:description" content="{{ $article->description }}">
        <meta property="og:title" content="{{ $article->SEO_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/articles/{{ $article->slug }}">
    <meta property="og:type" content="article">
@endsection


@section('title')
    @if (app()->getLocale() == "en")
        {{ $article->SEO_title_eng}}
    @endif
    @if (app()->getLocale() == "id")
        {{ $article->SEO_title}}
    @endif
@endsection

    
@section('content')
<section class="article_detail position-relative d-flex align-items-center justify-content-center">
    <img src="{{ asset("storage/" . $article->photo) }}" alt="{{ app()->getLocale() == "en" ? $article->title_eng : $article->title }}" class="w-100">
    <div class="container article_heading">
        <div class="row ps-md-2 position-relative">
            <div class="col-md-8 col-12 ps-md-5 text-left">
                <h1>
                    @if (app()->getLocale() == "en")
                        {{ $article->title_eng }}
                    @else
                        {{ $article->title }}
                    @endif
                </h1>
                <a class="mt-5" href="{{ app()->getLocale() == "en" ? route('article-category',$article->articleCategory->slug) : route('article-category.id',$article->articleCategory->slug) }}" class="text-warning fs-6 fw-bolder">{{ $article->articleCategory->title }}</a>
                <p>{{ $article->created_at->format('d M, Y H:m') }} WIB</p>
            </div>
        </div>
    </div>
</section>
<section class="article_desc mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 article_body">
                @if (app()->getLocale() == "en")
                {!! $article->body_eng !!}
                @endif
                @if (app()->getLocale() == "id")
                {!! $article->body !!}
                @endif
            </div>
        </div>
        <div class="row consultation_cta mt-5">
            <div class="col-12 d-flex align-items-center justify-content-start">
                <a href="@if (app()->getLocale() == " en") {{ route("contact") }} @else {{ route("contact") }} @endif">Consultation Now <img src="/assets/images/arrow.svg" class="ms-2" alt="arrow"></a>
            </div>
        </div>
    </div>
</section>
    
@endsection