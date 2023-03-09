@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="assets/css/pages/contact1.css">
@endsection

@section('title')
    Contact us | Ideatax
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
                        <div class="d-flex justify-content-start align-items-center gap-2 mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                            <a target="_blank" href="mailto:contact@ideatax.id">contact@ideatax.id</a>
                        </div>
                        <div class="d-flex justify-content-start align-items-center gap-2 mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                            <a href="tel:0212528471">(021) 2528471</a>
                        </div>
                        <div class="d-flex justify-content-start align-items-center gap-2 mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            <a href="tel:081287490887">0812 8749 0887</a>
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
                            <textarea class="form-control" type="text" name="message" placeholder="Message" id="message" required></textarea>
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