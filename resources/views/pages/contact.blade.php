@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/contact">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/contact2.css">
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
    
    <meta property="og:url" content="https://ideatax.id/contact">
    <meta property="og:type" content="article">
@endsection

@section('title')
    @if (session()->get('applocale') == "en")
        {{ $page->SEO_title_eng }}
    @endif
    @if (session()->get('applocale') == "id")
        {{ $page->SEO_title }}
    @endif
@endsection

@section('content')
    <section id="contactUs" class="contact_header section_gap">
        <div class="overlay"></div>
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h1>{{ __('home.contactButton') }}</h1>
                </div>
            </div>
        </div>
    </section>
    @include('includes.consultation')
@endsection