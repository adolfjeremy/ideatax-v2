@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/contact">
@endsection

@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/contact2.css">
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
    <meta property="og:url" content="https://ideatax.id/articles">
    <meta property="og:type" content="article">
@endsection

@section('title')
    {{ $page->SEO_title }}
@endsection

@section('content')
    <section id="contactUs" class="contact_header section_gap">
        <div class="overlay"></div>
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h1 data-aos="flip-left">Contact Us</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="address_form mt-4 py-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 address_form-detail p-3">
                    <h2>Get in touch</h2>
                    <div class="contact_detail mt-3 px-2">
                        <h3>Contact</h3>
                        <div class="contact_container d-flex justify-content-start align-items-center gap-2 mt-3">
                            <i class="bi bi-envelope"></i>
                            <a target="_blank" href="mailto:contact@ideatax.id">contact@ideatax.id</a>
                        </div>
                        <div class="contact_container d-flex justify-content-start align-items-center gap-2 mt-3">
                            <i class="bi bi-telephone"></i>
                            <a href="tel:0212528471">(021) 2528471</a>
                        </div>
                        <div class="contact_container d-flex justify-content-start align-items-center gap-2 mt-3">
                            <i class="bi bi-phone"></i>
                            <a href="tel:0811195708">0811 195 708</a>
                        </div>
                    </div>
                    <div class="address_detail mt-4">
                        <h3>Office Address</h3>
                        <h4 class="mt-3">Menara Kuningan, South Jakarta, Indonesia</h4>
                        <p> Level 1 Unit B3 Jl. H. Rasuna Said Kav. 5, Karet Kuningan, Setiabudi, South Jakarta</p>
                    </div>
                </div>
                <div class="col-12 col-lg-8 py-3 px-5 contact_form">
                    <h5>Ask Any Question</h5>
                        @if(session()->has('successAlert'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('successAlert')}}
                        </div>
                        @endif 
                    <form action="{{ route('send-mail') }}" method="GET"> 
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" required>
                            <label for="name">Full Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" name="phone_number" class="form-control" id="tel" placeholder="Phone Number" required>
                            <label for="tel">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" type="text" name="message" placeholder="Message" id="message"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <div class="contact_form_button_container">
                            <button type="submit" class="btn btn-success">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection