@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/life-at-ideatax">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/careers1.css">
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
    <meta property="og:url" content="https://ideatax.id/life-at-ideatax">
    <meta property="og:type" content="life-at-ideatax">
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
    <section class="career_page pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center heading text-center">
                    <h1>{{ __('lifeAtIdeatax.heading') }}</h1>
                    <p class="pw-5">{{ __('lifeAtIdeatax.subheading') }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="image-gallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="image-list">
                        @php $incrementCategory = 0 @endphp
                        @foreach ($images as $image)                            
                            <div class="image-item" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $incrementCategory +=1 }}" style="background-image: url('{{ asset("storage/" . $image->image) }}')">
                                <p class="image-item_title">
                                    @if (app()->getLocale() == "en")
                                        {{ $image->title_eng }}
                                    @endif
                                    @if (app()->getLocale() == "id")
                                        {{ $image->title }}
                                    @endif
                                </p>
                                <div class="overlay-cust"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @php $incrementCategory = 0 @endphp
                @foreach ($images as $image)
                    <div class="modal zoomable fade" id="exampleModal{{ $incrementCategory +=1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered">
                            <img src="{{ asset("storage/" . $image->image) }}" class="w-100 zoomable-image" alt="{{ $image->title }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="contact_lead py-5">
        <div class="container">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <h2>{{ __('lifeAtIdeatax.lead') }}</h2>
                <a href="{{ app()->getLocale() == "en" ? route("careers") : route("careers.id") }}" class="contact_lead-button btn btn-warning fw-bold">{{ __('lifeAtIdeatax.button') }}</a>
            </div>
        </div>
    </section>
@endsection

