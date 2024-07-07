@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-services">
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
@endsection

    
@section('content')
<section class="services py-5">
    <div class="container">
        <div class="row d-flex flex-column align-items-center mt-5">
            <div class="col-10 left mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Our solutions for clients.</h2>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <p>
                            We strive to deliver the best service possible for our clients with the help of<br>talents who continually develop their skills in improving the quality of our services.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-8 right mt-5">
                <div class="row services_list">
                    @foreach ($services as $service)
                    <a href="@if (app()->getLocale() == " en") {{ route('our-service-detail', $service->slug) }} @else {{ route('our-service-detail.id', $service->slug_eng) }} @endif" class="col-12 service_item d-flex align-items-center justify-content-between py-2">
                        <p class="text-start m-0 py-1">
                            @if (app()->getLocale() == "en")
                            {{ $service->title_eng }}
                            @else
                            {{ $service->title }}
                            @endif
                        </p>
                        <img src="/assets/images/arrow.svg" alt="arrow">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
