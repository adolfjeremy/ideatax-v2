<footer class="pt-5 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 d-flex flex-column align-items-start">
                <h2>Idea<strong>tax</strong></h2>
                <p class="m-0 fw-semibold">PT Ide Solid Indonesia</p>
                <p>{{ __('home.footer') }}</p>
            </div>
            <div class="col-12 col-md-4 d-flex flex-column mt-5 mt-md-0">
                <div class="email_phone align-items-start">
                    <a href="mailto:contact@ideatax.id"><i class="bi bi-envelope me-3"></i>contact@ideatax.id</a>
                </div>
                <div class="email_phone align-items-start">
                    <a href="tel:+622125196082"><i class="bi bi-telephone me-3"></i>+622125196082</a>
                </div>
                <div class="email_phone align-items-start">
                    <a href="tel:0811195708"><i class="bi bi-phone me-3"></i>0811 195 708</a>
                </div>
                <div class="address_item d-flex flex-column">
                    <i class="bi bi-buildings"></i>
                    <h2>Menara Kadin, South Jakarta, Indonesia</h2>
                    <a href="https://www.google.com/maps/place/Menara+Kuningan/@-6.218423,106.828485,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f3cbd9ee81e7:0x730534af13796af4!8m2!3d-6.2184283!4d106.8306737" target="_blank" rel="noopener noreferrer">Level 26 Jl. HR. Rasuna Said Blok X-5 Kav.2-3, East Kuningan, Setiabudi, South Jakarta, Jakarta
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-5 d-flex mt-5 mt-md-0">
                <div class="nav col-6">
                    <ul>
                        <li><a href="{{ app()->getLocale() == "en" ? route('home') : route('home.id') }}">Home</a></li>
                        <li><a href="{{ app()->getLocale() == "en" ? route('our-team') : route('our-team.id') }}">Team</a></li>
                        <li><a href="{{ app()->getLocale() == "en" ? route('our-services') : route('our-services.id') }}">Our Services</a></li>
                        <li><a href="{{ app()->getLocale() == "en" ? route('update') : route('update.id') }}">Updates</a></li>
                        <li><a href="{{ app()->getLocale() == "en" ? route('articles') : route('articles.id') }}">Articles</a></li>
                        <li><a href="{{ app()->getLocale() == "en" ? route('careers') : route('careers.id') }}">Career</a></li>
                        <li><a href="{{ app()->getLocale() == "en" ? route('life-at-ideatax') : route('life-at-ideatax.id') }}">Life at ideatax</a></li>
                        <li><a href="{{ app()->getLocale() == "en" ? route('contact') : route('contact.id') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="social col-6">
                    <ul>
                        <li><a href="https://www.linkedin.com/company/idea-tax/" target="_blank" rel="noopener noreferrer" class="d-flex"><i class="bi bi-linkedin me-2"></i>Linkedin</a></li>
                        <li class="mt-3"><a href="https://www.instagram.com/ideatax_idn/" target="_blank" rel="noopener noreferrer" class="d-flex"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                        <li class="mt-3"><a href="https://www.facebook.com/ideataxconsultant" target="_blank" rel="noopener noreferrer" class="d-flex"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center copy_right">
                <h2>&copy; Idea<strong>tax</strong> 2023</h2>
                <p>Developed by <a href="https://github.com/adolfjeremy" target="_blank" rel="noopener noreferrer">Jeremy</a>
                </p>
            </div>
        </div>
    </div>
</footer>