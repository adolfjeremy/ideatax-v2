@extends('layouts.main')


@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/ourServices1.css">
@endsection

@section('title')
    Our Services | Ideatax
@endsection

    
@section('content')
    <section id="ourServices" class="our_service_header section_gap">
        <div class="overlay"></div>
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h1 data-aos="flip-left">Our Services</h1>
                    <div class="d-flex button-container" data-aos="flip-right" data-aos-delay="200">
                        <a href="{{ route('contact') }}" class="btn btn-lg btn-warning">Get Started</a>
                        <a href="{{ route('our-services') }}" class="btn btn-lg btn-outline-light ms-3">Our Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="our_service_list section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>our areas of experties</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($services as $service)
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                                <h2 class="accordion-header" id="{{ $service->title }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $service->slug }}" aria-expanded="false" aria-controls="{{ $service->slug }}">
                                        {{ $service->title }}
                                    </button>
                                </h2>
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
@endsection