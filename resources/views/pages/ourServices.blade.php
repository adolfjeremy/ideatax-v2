@extends('layouts.main')


@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/ourServices.css">
@endsection

@section('title')
    Ideatax | Our Services
@endsection

    
@section('content')
    <section class="our_services section_header">
        <div class="overlay"></div>
        <div class="container">
            <h2 data-aos="fade-up">OUR SERVICES</h2>
            <p data-aos="fade-up" data-aos-delay="100">
                We provide the best service that focused on the best interests of the client. We are supported by professionals who are experts in their fields, to help you provide the completion of your daily activities and provide you with a reliable, solution and comprehensive service.
            </p>
        </div>
    </section>
    <section id="OurServices" class="my-5">
        <div class="container">
            <div class="row mt-3">
                <div class="our_services_list">
                    @php $incrementCategory = 0 @endphp
                    <div class="our_service_item" data-aos="zoom-in" data-aos-delay="{{ $incrementCategory+= 100 }}">
                        <a href="{{ route('tax-litigations') }}" class="service_title">Tax Litigations</a>
                        <p>Tax Audit Assistance, Tax Objection Assistance, Tax Appeal Assistance, Tax Judicial Review Assistance</p>
                        <a href="{{ route('tax-litigations') }}">Read More &rarr;</a>
                    </div>
                    @forelse ($services as $service)
                        @if ($service->id > 4)
                            <div class="our_service_item" data-aos="zoom-in" data-aos-delay="{{ $incrementCategory+= 100 }}">
                                <a href="{{ route('our-services-detail', $service->slug) }}" class="service_title">{{ $service->title }}</a>
                                <div>{!! str_limit($service->description, $limit = 200) !!}</div>
                                <a href="{{ route('our-services-detail', $service->slug) }}">Read More &rarr;</a>
                            </div>
                        @endif
                    @empty
                        <div class="col-12 text-center py-5">
                            No Services Found
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection