@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-services/
    @if (app()->getLocale() == "en")
        {{ $item->slug_eng }}
    @else
        {{ $item->slug }}
    @endif" >
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
<section class="services_detail position-relative d-flex align-items-center justify-content-center">
    <img src="{{ asset("storage/" . $item->image) }}" alt="Idetax team ready to serve you" class="w-100">
    <div class="container-fluid team-heading">
        <div class="row">
            <div class="col-12">
                <h1>
                    @if (app()->getLocale() == "en")
                        {{ $item->title_eng }}
                    @else
                        {{ $item->title }}
                    @endif
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="service_desc py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 px-md-5 px-0 d-flex align-items-center justify-content-center">
                <p class="text-center px-md-2 px-0">
                    @if (app()->getLocale() == "en")
                    {{ $item->description_eng }}
                    @else
                    {{ $item->description }}
                    @endif
                </p>
            </div>
        </div>
        <div class="row consultation_cta mt-5">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <a href="@if (app()->getLocale() == "en") {{ route("contact") }} @else {{ route("contact") }} @endif">Consultation Now <img src="/assets/images/arrow.svg" class="ms-2" alt="arrow"></a>
            </div>
        </div>
    </div>
</section>
@endsection