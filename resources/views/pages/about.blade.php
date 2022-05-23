@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/about.css">
@endsection

@section('title')
    About | Ideatax
@endsection

@section('content')
    <section id="aboutUs" class="section_gap overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 px-md-4 image_container" data-aos="fade-right">
                    <img src="assets/images/about-us-header.jpg" class="shadow-lg" alt=" team ideatax, konsultan pajak" />
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0 px-md-4 d-flex flex-column justify-content-center" data-aos="fade-left" data-aos-delay="100">
                    <div class="row">
                        <div class="col-12 text-center text-md-start">
                            <h2>About Idea<strong>tax</strong></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>With the rapid development of business, we understand your need to overcome the difficulties and complexity of the challenges you may face in business, especially related to taxation. Ideatax comes with the vision of becoming a leading tax consulting company, by providing high-quality services, and upholding the trust you have given us.</p>
                            <a href="{{ route('contact') }}" class="btn d-block d-md-inline btn-warning px-4 py-2 mt-2 me-lg-2 shadow">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="whyUs" class="section_gap overflow-hidden">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-12 col-md-6 px-md-4 image_container" data-aos="fade-left" data-aos-delay="100">
                    <img src="assets/images/why-work-with-us.jpg" class="shadow-lg" alt="gambar team ideatax, konsultan pajak" />
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0 px-md-4 d-flex flex-column justify-content-center" data-aos="fade-right">
                    <div class="row">
                        <div class="col-12 text-center text-md-start">
                            <h2>Why Idea<strong>tax</strong>?</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>At Idea<strong>tax</strong>, we build a community that is always focused on solving comprehensive problems. We are supported by professionals who are experts in their fields, to help you provide the completion of your daily activities and provide you with a reliable solution and comprehensive service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ourValue" class="section_gap">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" data-aos="fade-up">
                <h2>Our Core Values</h2>
            </div>
        <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                <p>We always aspire to provide the best service that is always focused on the best interests of the client. We also always prioritize the development of our talents so that they can continue to be relevant in existing changes to improve services to clients. Our core values that underlie the services we provide are :</p>
            </div>
        </div>
        <div class="row">
            <div class="our_value_list">
                <div class="our_value_item" data-aos="zoom-in" data-aos-delay="200"><span >Trustworthy</span></div>
                <div class="our_value_item" data-aos="zoom-in" data-aos-delay="300"><span >Professionalism</span></div>
                <div class="our_value_item" data-aos="zoom-in" data-aos-delay="400"><span >Creativity</span></div>
                <div class="our_value_item" data-aos="zoom-in" data-aos-delay="500"><span >Prudent</span></div>
            </div>
        </div>
    </div>
</section>
@endsection