@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/home.css">
@endsection

@section('title')
    Tax Consultant | Ideatax
@endsection

@section('content')
    <section class="hero_cta text-center">
        <div class="overlay"></div>
        <div class="container">
            @php $incrementCategory = 0 @endphp
            <h1 data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">Dedicate Ourselves to Present Tax Solutions to You</h1>
            <p data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">We provide you a comprehensive perspective, prudent and creative services to solve your tax challenge</p>
            <div class="d-grid gap-1 d-md-block button-container" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                <a href="{{ route('contact') }}" class="btn btn-lg btn-warning px-4 mt-3 me-lg-2">Get Started</a>
                <a href="{{ route('our-services') }}" class="btn btn-lg btn-outline-light px-4 mt-3 ms-lg-2">Our Services</a>
            </div>
        </div>
    </section>
    <section id="aboutUs" class="section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 px-md-4 image_container" data-aos="fade-right">
                    <img src="assets/images/about-us-home.jpg" class="shadow-lg" alt="team ideatax, konsultan pajak" />
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0 px-md-4 d-flex flex-column justify-content-center" data-aos="fade-left" data-aos-delay="100">
                    <div class="row">
                        <div class="col-12 text-center text-md-start">
                            <h2>About Idea<strong>tax</strong></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>We focus on helping your business grow and achieve its goals. Our day-to-day activities are focused on how we maintain strong relationships and maintain your trust, as well as provide thoughtful solutions to help manage your tax risks and meet beyond your expectations.</p>
                            <a href="{{ route('about') }}" class="btn d-block d-md-inline btn-warning px-4 py-2 mt-2 me-lg-2 shadow">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ourServices" class="section_gap">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" data-aos="zoom-in">
                <h2>Services We Offer</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="our_services_list">
                @php $incrementCategory = 0 @endphp
                @foreach ($services as $service)
                    <a href="{{ route('our-services') }}" class="our_service_item" data-aos="zoom-in" data-aos-delay="{{ $incrementCategory+= 100 }}"><span>{{ $service->title }}</span></a>
                @endforeach                
                <a href="{{ route('our-services') }}" class="our_service_item" data-aos="zoom-in" data-aos-delay="{{ $incrementCategory+= 100 }}"><span >Discover more →</span></a>
            </div>
        </div>
    </div>
</section>
@endsection