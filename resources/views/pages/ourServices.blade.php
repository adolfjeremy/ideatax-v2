@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-services">
@endsection


@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/ourServices2.css">
@endsection


@section('meta')
    @if ($page->description)
        <meta name="description" content="{{ $page->description }}">
        <meta property="og:description" content="{{ $page->description }}">
    @else
        <meta name="description" content="We always aspire to provide the best service that is always focused on the best interests of the client. We also always prioritize the development of our talents so that they can continue to be relevant in existing changes to improve services to clients.">
        <meta property="og:description" content="We always aspire to provide the best service that is always focused on the best interests of the client. We also always prioritize the development of our talents so that they can continue to be relevant in existing changes to improve services to clients.">
    @endif
    
    <meta property="og:title" content="{{ $page->SEO_title }}">
    <meta property="og:url" content="https://ideatax.id/our-services">
    <meta property="og:type" content="article">
@endsection


@section('title')
    {{ $page->SEO_title }}
@endsection

    
@section('content')
    <section id="ourServices" class="our_service_header section_gap">
        <div class="overlay"></div>
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h1 data-aos="flip-left">Our Services</h1>
                </div>
            </div>
        </div>
    </section>
        <section class="our_service_list section_gap mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>our areas of experties</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($services as $service)
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                                <h3 class="accordion-header" id="{{ $service->title }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $service->slug }}" aria-expanded="false" aria-controls="{{ $service->slug }}">
                                        {{ $service->title }}
                                    </button>
                                </h3>
                                <div id="{{ $service->slug }}" class="accordion-collapse collapse" aria-labelledby="{{ $service->title }}"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body py-1">
                                        {!! $service->description !!}
                                    </div>
                                </div>
                            </div>
                            @empty
                                There is no data
                            @endforelse
                        </div>
                    </div>
                </div>
        </section>
        <section class="contact_lead py-5 mt-5">
            <div class="container">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <h2>Talk to us about your needs</h2>
                    <a href="{{ route("contact") }}" class="contact_lead-button btn btn-warning fw-bold">Contact us</a>
                </div>
            </div>
        </section>
@endsection