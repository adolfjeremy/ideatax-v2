@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/ourServices.css">
@endsection

@section('title')
    Ideatax | Tax Litigations
@endsection

@section('content')
<section class="our_services section_header">
        <div class="overlay"></div>
        <div class="container">
            <h2>OUR SERVICES</h2>
            <p>
                Tax Litigations
            </p>
        </div>
    </section>
<section id="OurServicesList" class="mb-5 mt-5">
    <div class="container">
        <div class="our_services_list">
            @forelse ($services as $service)
                <div class="our_service_item">
                    <a href="{{ route('our-services-detail', $service->slug) }}" class="service_title">{{ $service->title }}</a>
                    <div>
                    {!! str_limit($service->description, $limit = 200) !!}
                    </div>
                    <a href="{{ route('our-services-detail', $service->slug) }}" class="d-flex align-items-center">Read More &rarr;</a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    No Services Found
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection