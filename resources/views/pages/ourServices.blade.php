@extends('layouts.main')

@section('canonical')
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
@endsection

    
@section('content')
    <section id="ourServices" class="our_service_header section_gap">
        <div class="overlay"></div>
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h1>{{ __('home.service') }}</h1>
                </div>
            </div>
        </div>
    </section>
        <section class="our_service_list section_gap mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 subtitle">
                        <h2>{{ __('home.serviceSub') }}</h2>
                    </div>
                </div>
                @foreach ($services as $service)
                <div class="row our_service_item py-2">
                    <div class="col-12 col-md-4">
                        <img src="{{ asset("storage/" . $service->image) }}" class="w-100" alt="Tax and Customs Compliances">
                    </div>
                    <div class="col-12 col-md-8 d-flex flex-column align-items-start justify-content-center">
                         <h2>
                            <a href="
                                @if (app()->getLocale() == "en")
                                {{ route('our-service-detail', $service->slug) }}
                                @else
                                {{ route('our-service-detail.id', $service->slug_eng) }}
                                @endif
                                ">
                                @if (app()->getLocale() == "en")
                                {{ $service->title_eng }}
                                @else
                                {{ $service->title }}
                                @endif
                            </a>
                        </h2>
                        <p class="text-start">
                            @if (app()->getLocale() == "en")
                            {!! str_limit($service->description_eng, $limit = 170) !!}
                            @else
                            {!! str_limit($service->description, $limit = 170) !!}
                            @endif
                        </p>
                         <a class="more_button" href="
                                @if (app()->getLocale() == "en")
                                {{ route('our-service-detail', $service->slug) }}
                                @else
                                {{ route('our-service-detail.id', $service->slug_eng) }}
                                @endif
                                ">
                                @if (app()->getLocale() == "en")
                                More about {{ $service->title_eng }} 
                                @else
                                Baca detail {{ $service->title }} 
                                @endif
                                <i class="bi bi-arrow-right"></i>
                            </a>
                    </div>
                </div>
                @endforeach
                
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            @forelse ($services as $service)
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="{{ $service->title }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $service->slug }}" aria-expanded="false" aria-controls="{{ $service->slug }}">
                                        @if (app()->getLocale() == "en")
                                            {{ $service->title_eng }}
                                        @endif
                                        @if (app()->getLocale() == "id")
                                            {{ $service->title }}
                                        @endif
                                    </button>
                                </h3>
                                <div id="{{ $service->slug }}" class="accordion-collapse collapse" aria-labelledby="{{ $service->title }}"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body py-1">
                                        @if (app()->getLocale() == "en")
                                            {!! $service->description_eng !!}
                                        @endif
                                        @if (app()->getLocale() == "id")
                                            {!! $service->description !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                                There is no data
                            @endforelse
                        </div>
                    </div>
                </div> --}}
        </section>
        <section class="contact_lead py-5 mt-5">
            <div class="container">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <h2>{{ __('home.contact') }}</h2>
                    <a href="{{ app()->getLocale() == "en" ? route("contact") : route("contact.id") }}" class="contact_lead-button btn btn-warning fw-bold">{{ __('home.contactButton') }}</a>
                </div>
            </div>
        </section>
@endsection