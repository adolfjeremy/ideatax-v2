@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-services/
    @if (app()->getLocale() == "en")
        {{ $item->slug_eng }}
    @else
        {{ $item->slug }}
    @endif" >
@endsection


@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/ourServices2.css">
@endsection


@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $item->meta_description_eng }}">
        <meta property="og:description" content="{{ $item->meta_description_eng }}">
        <meta property="og:title" content="{{ $item->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $item->meta_descriptiobn }}">
        <meta property="og:description" content="{{ $item->meta_descriptiobn }}">
        <meta property="og:title" content="{{ $item->SEO_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/our-services/
    @if (app()->getLocale() == "en")
        {{ $item->slug_eng }}
    @else
        {{ $item->slug }}
    @endif">
    <meta property="og:type" content="article">
@endsection


@section('title')
    @if (app()->getLocale() == "en")
        {{ $item->SEO_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $item->SEO_title }}
    @endif
@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 d-flex flex-column align-items-center justify-content-center">
                    <h1 class="fw-bold">
                        @if (app()->getLocale() == "en")
                        {{ $item->title_eng }}
                        @else
                        {{ $item->title }}
                        @endif
                    </h1>
                    <p class="mt-3">
                        @if (app()->getLocale() == "en")
                        {{ $item->description_eng }}
                        @else
                        {{ $item->description }}
                        @endif
                    </p>
                </div>
                <div class="col-12 col-lg-5">
                    
                        <img src="{{ asset("storage/" . $item->image) }}" class="w-100" alt="{{ $item->title }}">
                </div>
            </div>
        </div>
    </section>
    @include('includes.consultation')
@endsection