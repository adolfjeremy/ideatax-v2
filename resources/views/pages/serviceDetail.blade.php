@extends('layouts.main')

{{-- @section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-services">
@endsection


@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/ourServices2.css">
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
    <meta property="og:url" content="https://ideatax.id/our-services">
    <meta property="og:type" content="article">
@endsection


@section('title')
    @if (app()->getLocale() == "en")
        {{ $page->SEO_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $page->SEO_title }}
    @endif
@endsection --}}

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 d-flex flex-column align-items-center justify-content-center">
                    <h1 class="fw-bold">{{ $item->title }}</h1>
                    <p class="mt-3">{{ $item->description }}</p>
                </div>
                <div class="col-12 col-lg-5">
                    
                        <img src="/assets/images/tax.jpg" class="w-100" alt="Tax and Customs Compliances">
                </div>
            </div>
        </div>
    </section>
    @include('includes.consultation')
@endsection