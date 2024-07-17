@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/articles">
@endsection

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $page->description_eng }}">
        <meta property="og:description" content="{{ $page->description_eng }}">
        <meta property="og:title" content="{{ $page->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $page->description }}">
        <meta property="og:description" content="{{ $page->description }}">
        <meta property="og:title" content="{{ $page->SEO_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/articles">
    <meta property="og:type" content="article">
@endsection

@section('title')
    @if (app()->getLocale() == "en")
        {{ $page->SEO_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $page->SEO_title }}
    @endif
@endsection

    
@section('content')
<section id="carouselExampleInterval" class="articles_hero carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($latests as $item)
        <div class="carousel-item carousel_custom @if ($loop->first)active @endif" data-bs-interval="7000">
            <img src="{{ asset("storage/" . $item->photo) }}" class="d-block w-100" alt="{{ $item->title }}">
            <div class="article_overview d-flex flex-column align-items-start justify-content-center gap-2">
                <h1>
                    @if ((app()->getLocale() == "en"))
                    {{ $item->title_eng }}
                    @else
                    {{ $item->title }}
                    @endif
                </h1>
                <div class="article_excerpt">
                    @if (app()->getLocale() == "en")
                        {!! str_limit($item->body_eng , $limit = 271) !!}
                    @endif
                    @if (app()->getLocale() == "id")
                        {!! str_limit($item->body, $limit = 271) !!}
                    @endif
                </div>
                <a href="{{ app()->getLocale() == "en" ? route('article-detail',$item->slug_eng) : route('article-detail.id',$item->slug) }}" class="btn btn-lg">
                    {{ __('ArticlePage.button'); }}
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section class="latest_articles">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h2>
                    {{ __('ArticlePage.heading'); }}
                </h2>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $item)
            <div class="col-4 articles_item d-flex flex-column gap-4 align-items-start mt-5 px-4">
                <img src="{{ asset("storage/" . $item->thumbnail) }}" class="w-100" alt="@if (app()->getLocale() == "en")
                    {{ $item->title_eng }}
                    @endif
                    @if (app()->getLocale() == "id")
                    {{ $item->title }}
                    @endif">
                <h3 class="m-0">
                    @if (app()->getLocale() == "en")
                    {{ $item->title_eng }}
                    @endif
                    @if (app()->getLocale() == "id")
                    {{ $item->title }}
                    @endif

                </h3>
                <div class="m-0">
                    @if (app()->getLocale() == "en")
                        {!! str_limit($item->body_eng , $limit = 120) !!}
                    @endif
                    @if (app()->getLocale() == "id")
                        {!! str_limit($item->body, $limit = 120) !!}
                    @endif
                </div>
                <a href="{{ app()->getLocale() == "en" ? route('article-detail',$item->slug_eng) : route('article-detail.id',$item->slug) }}" class="btn btn-lg">
                    {{ __('ArticlePage.button'); }}
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center py-5">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</section>
@endsection