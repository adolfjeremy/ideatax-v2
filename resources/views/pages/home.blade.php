@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/">
@endsection

@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/home2.css">
@endsection

@section('meta')
    @if ($page->description)
        <meta name="description" content="{{ $page->description }}">
        <meta property="og:description" content="{{ $page->description }}">
    @else
        <meta name="description" content="We combine a long running experience in tax consulting and tax authority to deliver thorough solutions to our clients. We also present essential approaches with problem-solving capabilities imbued with a full commitment for the most polished quality of service for our clients. Ideatax presents a comprehensive, prudent, and creative services to solve your tax challenges. We focus on helping your business grow and achieve its goals. Our day-to-day activities focus on the way we maintain a strong relationship and your trust, as well as actively providing thoughtful tax solutions in helping you to manage your tax risks.">
        <meta property="og:description" content="We combine a long running experience in tax consulting and tax authority to deliver thorough solutions to our clients. We also present essential approaches with problem-solving capabilities imbued with a full commitment for the most polished quality of service for our clients. Ideatax presents a comprehensive, prudent, and creative services to solve your tax challenges. We focus on helping your business grow and achieve its goals. Our day-to-day activities focus on the way we maintain a strong relationship and your trust, as well as actively providing thoughtful tax solutions in helping you to manage your tax risks.">
    @endif
    
    <meta property="og:title" content="{{ $page->SEO_title }}">
    <meta property="og:url" content="https://ideatax.id">
    <meta property="og:type" content="website">
@endsection

@section('title')
    {{ $page->SEO_title }}
@endsection

@section('content')
    <section class="hero_cta text-center py-0 py-lg-5 px-0">
        <div class="overlay"></div>
        <div class="container py-5">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h1 data-aos="flip-left">We Provide Tax Solutions for You</h1>
                    <div class="d-flex button-container" data-aos="flip-right" data-aos-delay="200">
                        <a href="{{ route('contact') }}" class="btn btn-lg btn-warning">Contact Us</a>
                        <a href="{{ route('our-services') }}" class="btn btn-lg btn-outline-light ms-3">Our Services</a>
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
                    <h2 >About Us</h2>
                    <p class="mb-2">&emsp;&emsp;We combine a long running experience in tax consulting and tax authority to deliver thorough
                        solutions to our clients. We also present essential approaches with problem-solving
                        capabilities imbued with a full commitment for the most polished quality of service for our clients.</p>
                    @if($compro)
                        <div class="mt-2 button-container">
                            <a href="{{ asset("storage/" . $compro->compro) }}" target="_blank" class="btn btn-md btn-warning rounded">Company Profile</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="why_ideatax pb-5">
        <div class="container">
            <div class="row text-center mb-4">
                <h2 data-aos="zoom-in-right">Why Ideatax?</h2>
            </div>
            <div class="row">
                <div class="reason_list text-center">
                    <div class="reason_item p-4 d-flex flex-column align-items-center justify-content-center" data-aos="zoom-in-up" data-aos-delay="100">
                        <div class="quote_image">
                            <i class="bi bi-quote text-light fs-1 text"></i>
                        </div>
                        <p>Possesses a blend of years of experiences in tax consulting and tax authority for
                            comprehensive solutions.</p>
                    </div>
                    <div class="reason_item p-4 d-flex flex-column align-items-center justify-content-center" data-aos="zoom-in-up" data-aos-delay="150">
                        <div class="quote_image">
                            <i class="bi bi-quote text-light fs-1 text"></i>
                        </div>
                        <p>Provides integrated approaches in mitigating tax-related problems.</p>
                    </div>
                    <div class="reason_item p-4 d-flex flex-column align-items-center justify-content-center" data-aos="zoom-in-up" data-aos-delay="200">
                        <div class="quote_image">
                            <i class="bi bi-quote text-light fs-1 text"></i>
                        </div>
                        <p>Knowledgeable in Compliance Risk Management system used by Directorate General of Taxes.
                        </p>
                    </div>
                    <div class="reason_item p-4 d-flex flex-column align-items-center justify-content-center" data-aos="zoom-in-up" data-aos-delay="250">
                        <div class="quote_image">
                            <i class="bi bi-quote text-light fs-1 text"></i>
                        </div>
                        <p>One of leading consultants related to foreign investment in Indonesia.
                        </p>
                    </div>
                    <div class="reason_item p-4 d-flex flex-column align-items-center justify-content-center" data-aos="zoom-in-up" data-aos-delay="300">
                        <div class="quote_image">
                            <i class="bi bi-quote text-light fs-1 text"></i>
                        </div>
                        <p>Experienced in using regulatory compliance in resolving client's tax-related issues
                            which were identified of having a
                            low level of compliance towards the taxation system in Indonesia.
                        </p>
                    </div>
                    <div class="reason_item p-4 d-flex flex-column align-items-center justify-content-center" data-aos="zoom-in-up" data-aos-delay="350">
                        <div class="quote_image">
                            <i class="bi bi-quote text-light fs-1 text"></i>
                        </div>
                        <p>Proven record in transfer pricing documentation to successfully resolving numerous
                            transfer pricing dispute from
                            various industries.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_value pb-2 mt-2">
        <div class="container">
            <div class="row" data-aos="zoom-in">
                <div class="col-12 text-center">
                    <h2>Value</h2>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center text-center">
                    <p>We strive to deliver the best service possible for our clients with the help of talents who
                        continually develop their
                        skills in improving the quality of our services. Take a look at our underlying values:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="value_list">
                        <div class="value_item text-center d-block">
                            <img src="/assets/images/trustworthy-min.jpg" alt="Trustworthy" class="w-100">
                            <div class="overlay"></div>
                            <h3>Trustworthy</h3>
                        </div>
                        <div class="value_item text-center d-block">
                            <img src="/assets/images/professional-min.jpg" alt="Professional" class="w-100">
                            <div class="overlay"></div>
                            <h3>Professional</h3>
                        </div>
                        <div class="value_item text-center d-block">
                            <img src="/assets/images/prudent-min.jpg" alt="Creative" class="w-100">
                            <div class="overlay"></div>
                            <h3>Creative</h3>
                        </div>
                        <div class="value_item text-center d-block">
                            <img src="/assets/images/creative-min.jpg" alt="Prudent" class="w-100">
                            <div class="overlay"></div>
                            <h3>Prudent</h3>
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
                    <h2 data-aos="zoom-in-right">Meet Our Team</h2>
                </div>
            </div>
            <div class="row overflow-hidden">
                <div class="col-12 team_image" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="200" data-aos-offset="0">
                    <img src="/assets/images/about.jpg" alt="ideatax team" title="ideatax" class="w-100">
                    <a href="{{ route('our-team') }}"></a>
                </div>
            </div>
        </div>
    </section>
    <section class="our_services overflow-hidden">
        <div class="container">
            <div class="row text-center">
                <h2 data-aos="zoom-in-right">Our Services</h2>
            </div>
        </div>
        <div class="container">
            <div class="slider_outer">
                <div class="our_services_list m-0">
                    @foreach ($services as $service)
                        <div>
                            <div class="our_service_item d-block">
                                <h3>
                                    <a href="{{ route('our-services') }}/#{{ $service->title }}" class="d-block" title="{{ $service->title }}">{!! str_limit($service->title, $limit = 25) !!}</a>
                                </h3>
                                <hr mb-3>
                                <p>{{ $service->excerpt }}</p>
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
                <h2>Talk to us about your needs</h2>
                <a href="{{ route("contact") }}" class="contact_lead-button btn btn-warning fw-bold">Contact us</a>
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