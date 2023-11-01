@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/">
@endsection

@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/home2.css">
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
    <meta property="og:url" content="https://ideatax.id">
    <meta property="og:type" content="website">
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
    <section class="hero_cta text-center py-0 py-lg-5 px-0">
        <div class="overlay"></div>
        <div class="container py-5">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h1>{{ __('home.hero') }}</h1>
                    <div class="d-flex button-container">
                        <a href="{{ route('contact') }}" class="btn btn-lg btn-warning">{{ __('home.contactButton') }}</a>
                        <a href="{{ route('our-services') }}" class="btn btn-lg btn-outline-light ms-3">{{ __('home.service') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us">
        <div class="container py-5">
            <div class="about_bg"></div>
            <div class="row text-center p-4 d-flex align-items-center justify-content-center position-relative">
                <div class="col-12 col-lg-10 p-4 about_us_text">
                    <h2>{{ __('home.aboutHeader') }}</h2>
                    <p class="mb-2">&emsp;&emsp;{{ __('home.about') }}</p>
                    @if($compro)
                        <div class="mt-2 button-container">
                            <a href="{{ asset("storage/" . $compro->compro) }}" target="_blank" class="btn btn-md btn-warning rounded">{{ __('home.aboutButton') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="why_ideatax pb-5">
        <div class="container">
            <div class="row text-center mb-4">
                <h2>{{ __('home.whyHeader') }}</h2>
            </div>
            <div class="row">
                <div class="reason_list text-center">
                    @foreach(__('reason') as $key => $value)
                    <div class="reason_item p-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="quote_image">
                            <i class="bi bi-quote text-light fs-1 text"></i>
                        </div>
                        <p>{{ $value }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="our_value pb-2 mt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>{{ __('home.valueHeader') }}</h2>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center text-center">
                    <p>{{ __('home.value') }}:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="value_list">
                        <div class="value_item text-center d-block">
                            <img src="/assets/images/trustworthy.jpg" alt="{{ __('value.one') }}" class="w-100">
                            <div class="overlay"></div>
                            <h3>{{ __('value.one') }}</h3>
                        </div>
                        <div class="value_item text-center d-block">
                            <img src="/assets/images/professional.jpg" alt="{{ __('value.two') }}" class="w-100">
                            <div class="overlay"></div>
                            <h3>{{ __('value.two') }}</h3>
                        </div>
                        <div class="value_item text-center d-block">
                            <img src="/assets/images/prudent.jpg" alt="{{ __('value.three') }}" class="w-100">
                            <div class="overlay"></div>
                            <h3>{{ __('value.three') }}</h3>
                        </div>
                        <div class="value_item text-center d-block">
                            <img src="/assets/images/creative.jpg" alt="{{ __('value.four') }}" class="w-100">
                            <div class="overlay"></div>
                            <h3>{{ __('value.four') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us_slick pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>{{ __('home.teamHeader') }}</h2>
                </div>
            </div>
            <div class="row overflow-hidden">
                <div class="col-12 team_image">
                    <img src="/assets/images/about.webp" alt="ideatax team" title="ideatax" class="w-100">
                    <a href="{{ route('our-team') }}"></a>
                </div>
            </div>
        </div>
    </section>
    <section class="our_services overflow-hidden">
        <div class="container">
            <div class="row text-center">
                <h2>{{ __('home.service') }}</h2>
            </div>
        </div>
        <div class="container">
            <div class="slider_outer">
                <div class="our_services_list m-0">
                    @foreach ($services as $service)
                        <div>
                            <div class="our_service_item d-block">
                                <h3>
                                    @if (app()->getLocale() == "en")
                                        <a href="{{ route('our-services') }}/#{{ $service->title_eng }}" class="d-block" title="{{ $service->title_eng }}">{!! str_limit($service->title_eng, $limit = 25) !!}</a>
                                        <hr mb-3>
                                        <p>{{ $service->excerpt_eng }}</p>
                                    @endif
                                    @if (app()->getLocale() == "id")
                                        <a href="{{ route('our-services.id') }}/#{{ $service->title }}" class="d-block" title="{{ $service->title }}">{!! str_limit($service->title, $limit = 25) !!}</a>
                                        <hr mb-3>
                                        <p>{{ $service->excerpt }}</p>
                                    @endif
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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

@push('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/assets/vendors/slick-1.8.1/slick/slick.min.js"></script>
    <script>
        $('.our_services_list').slick({
            dots: true,
            autoplay:true,
            autoplaySpeed: 4000,
            slidesToScroll: 1,
            slidesToShow: 3,
            centerMode: true,
            centerPadding:0,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
                },
                {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    autoplay: false,
                }
                }
            ]
            });
    </script>
@endpush