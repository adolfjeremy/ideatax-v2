@extends('layouts.main')


@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/ourServices.css">
@endsection

@section('title')
    Our Services | Ideatax
@endsection

    
@section('content')
    <section id="ourServices" class="our_service_header section_gap">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mx-lg-5 position-relative">
                <div class="col-12 text-start">
                    <h1 data-aos="fade-up">what we do</h1>
                    <h2 data-aos="fade-up" data-aos-delay="100">We provide the best service that focused on the best interests of the client</h2>
                </div>
                <div class="col-12 col-lg-6 ms-lg-auto" data-aos="fade-up" data-aos-delay="200">
                    <p>We are supported by professionals who are experts in their fields, to help you provide the
                        completion of your daily
                        activities and provide you with a reliable, solution and comprehensive service.</p>
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