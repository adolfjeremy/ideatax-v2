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
    <div class="container py-2">
        <div class="row text-center">
            <div class="col-12">
                <h2>{{ __('home.aboutHeader') }}</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <div class="col-12 col-lg-7 d-flex flex-column about_us_text">
                <p class="mb-2 text-start">{{ __('home.about') }}</p>
                <div class="stat_list text-center mt-4">
                    <div class="stat_item">
                        <p class="value">359</p>
                        <p class="stat_name">Projects</p>
                    </div>
                    <div class="stat_item">
                        <p class="value">200+</p>
                        <p class="stat_name">Clients</p>
                    </div>
                    <div class="stat_item">
                        <p class="value">20+</p>
                        <p class="stat_name">Years of Partner<br>Experience</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex flex-column align-items-center justify-content-start">
                <img src="/assets/images/award.png" class="w-100" alt="ideatax award winning">
                @if($compro)
                <div class="mt-4 button-container">
                    <button type="button" class="btn btn-warning rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        {{ __('home.aboutButton') }}
                    </button>
                    {{-- <a href="{{ asset("storage/" . $compro->compro) }}" target="_blank" class="btn btn-md btn-warning rounded">{{ __('home.aboutButton') }}</a> --}}
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title text-start fw-normal fs-6" id="staticBackdropLabel">Silakan isi formulir di bawah ini sebelum mengunduh</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('home-save') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 d-flex flex-column align-items-start">
                                        <label for="name" class="form-label fs-6">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>
                                    <div class="mb-3 d-flex flex-column align-items-start">
                                        <label for="email" class="form-label fs-6">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                    <div class="mb-3 d-flex flex-column align-items-start">
                                        <label for="tel" class="form-label fs-6">No. Telepon</label>
                                        <input type="tel" class="form-control" name="tel" id="tel" required>
                                    </div>
                                    <div class="mb-3 d-flex flex-column align-items-start">
                                        <label for="company" class="form-label fs-6">Perusahaan</label>
                                        <input type="text" class="form-control" name="company" id="company" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="why_ideatax pb-5 mt-5">
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
<section class="our_value pb-5 mt-5">
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
{{-- <section class="about_us_slick pb-5">
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
</section> --}}
<section class="our_services overflow-hidden mt-5">
    <div class="container">
        <div class="row text-center">
            <h2>{{ __('home.service') }}</h2>
        </div>
    </div>
    <div class="container">
        {{-- <div class="value_list">
                @foreach ($sliders as $item)
                <div class="card">
                    <img src="{{ asset("storage/" . $item->service->image) }}" alt="{{ $item->service->title }}" class="card-img-top">
        <div class="card-body d-flex flex-column">
            <h2 class="text-center mb-1">
                <a href="
                        @if (app()->getLocale() == " en") {{ route('our-service-detail', $item->service->slug_eng) }} @else {{ route('our-service-detail.id', $item->service->slug) }} @endif" class="text-dark fs-5 fw-bold text-center lh-1" href="{{ route('our-service-detail', $item->service->id) }}">
                    @if (app()->getLocale() == "en")
                    {{ $item->service->title_eng }}
                    @else
                    {{ $item->service->title }}
                    @endif
                </a>
            </h2>
            <p class="card-text fs-6">
                @if (app()->getLocale() == "en")
                {{ $item->service->excerpt_eng }}
                @else
                {{ $item->service->excerpt }}
                @endif
            </p>
            <a href="
                        @if (app()->getLocale() == " en") {{ route('our-service-detail', $item->service->slug_eng) }} @else {{ route('our-service-detail.id', $item->service->slug) }} @endif" class="fs-6 btn btn-warning">
                @if (app()->getLocale() == "en")
                Read Details
                @else
                Baca Detail
                @endif
            </a>
        </div>
    </div>
    @endforeach
    </div> --}}
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
{{-- <section class="contact_lead py-5 mt-5">
        <div class="container">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <h2>{{ __('home.contact') }}</h2>
<a href="{{ app()->getLocale() == "en" ? route("contact") : route("contact.id") }}" class="contact_lead-button btn btn-warning fw-bold">{{ __('home.contactButton') }}</a>
</div>
</div>
</section> --}}

@include('includes.consultation')
@endsection

@push('script')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/assets/vendors/slick-1.8.1/slick/slick.min.js"></script>
<script>
    $('.our_services_list').slick({
        dots: true
        , autoplay: true
        , autoplaySpeed: 4000
        , slidesToScroll: 1
        , slidesToShow: 3
        , centerMode: true
        , centerPadding: 0
        , responsive: [{
                breakpoint: 1024
                , settings: {
                    slidesToShow: 2
                , }
            }
            , {
                breakpoint: 600
                , settings: {
                    slidesToShow: 2
                , }
            }
            , {
                breakpoint: 480
                , settings: {
                    slidesToShow: 1
                    , dots: false
                    , autoplay: false
                , }
            }
        ]
    });

</script>
@endpush
