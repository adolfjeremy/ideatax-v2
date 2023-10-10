<header>
    <div class="top_bar py-2 d-none d-xl-block shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="location d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill fs-5 text me-1"></i>
                        <a href="https://www.google.com/maps/place/Menara+Kuningan/@-6.218423,106.828485,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f3cbd9ee81e7:0x730534af13796af4!8m2!3d-6.2184283!4d106.8306737" target="_blank" rel="noopener noreferrer">Menara Kuningan - Level 1 Unit B3 Jl. H. Rasuna Said Kav. 5 Karet Kuningan,
                            Setiabudi
                            South Jakarta
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="phone d-flex align-items-center">
                        <i class="bi bi-telephone-fill fs-5 text me-1"></i>
                        <a href="tel:+622125196082">+622125196082</a>
                        <span class="mx-1">,</span>
                        <a href="tel:0811195708">0811 195 708</a>
                        </div>
                        <div class="dropdown ms-3">
                            <a class="btn btn-warning dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{app()->getLocale()}}
                            </a>
                            <ul class="dropdown-menu">
                                @if (app()->getLocale() == "id")
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('home') }}">
                                            <span>English</span>
                                            <img class="lang-flag shadow ms-1" src="/assets/images/gb.svg" alt="english flag">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center justify-content-between active" href="{{ route('home.id') }}">
                                            <span>Indonesia</span>
                                            <img class="lang-flag shadow ms-1" src="/assets/images/id.svg" alt="indonesia flag">
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center justify-content-between active" href="{{ route('home') }}">
                                            <span>English</span>
                                            <img class="lang-flag shadow ms-1" src="/assets/images/gb.svg" alt="english flag">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('home.id') }}">
                                            <span>Indonesia</span>
                                            <img class="lang-flag shadow ms-1" src="/assets/images/id.svg" alt="indonesia flag">
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav_bar py-2 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between justify-content-xl-evenly">
            @if (app()->getLocale() == "en")
                <a href="/" class="navbar_brand">Idea<strong>tax</strong></a>
            @else
                <a href="/id" class="navbar_brand">Idea<strong>tax</strong></a> 
            @endif
            <button id="hamburgerButton" class="d-block d-xl-none">
                <div class="inner-line"></div>
            </button>
            <nav class="reponsive_nav d-flex d-none d-xl-block">
                @if (app()->getLocale() == "id")
                    @include('includes/navbarID')
                @else
                    @include('includes/navbarEN')
                @endif
            </nav>
            <nav class="social_container d-none d-xl-block">
                <ul class="d-flex align-items-center gap-1">
                    <li class="nav-item">
                        <a href="https://www.linkedin.com/company/idea-tax/" target="_blank" rel="noopener noreferrer" class="nav--link" title="Linkedin"><i
                                class="bi bi-linkedin me-2 fs-4 text"></i></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.instagram.com/ideatax_idn/" target="_blank" rel="noopener noreferrer" class="nav-link" title="Instagram"><i
                                class="bi bi-instagram me-2 fs-4 text"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.facebook.com/ideataxconsultant" target="_blank" rel="noopener noreferrer" class="nav--link" title="Facebook"><i
                                class="bi bi-facebook me-2 fs-4 text"></i></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="mobile_nav d-block d-xl-none shadow-lg">
        <nav class="d-block p-1">
            <ul class="d-block mobile_top_bar">
                <li class="nav-item py-2 d-flex align-items-center justify-content-start">
                    <i class="bi bi-geo-alt-fill fs-5 text me-2"></i>
                    <a href="https://www.google.com/maps/place/Menara+Kuningan/@-6.218423,106.828485,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f3cbd9ee81e7:0x730534af13796af4!8m2!3d-6.2184283!4d106.8306737" target="_blank" rel="noopener noreferrer">Menara Kuningan - Level 1 Unit B3 Jl. H. Rasuna Said Kav. 5 Karet Kuningan,
                        Setiabudi
                        South Jakarta
                    </a>
                </li>
                <li class="nav-item py-2 d-flex align-items-center justify-content-start contact">
                    <i class="bi bi-telephone-fill fs-5 text me-2"></i>
                    <div>
                        <a href="tel:+622125196082">+622125196082</a>
                        <span class="mx-1">,</span>
                        <a href="tel:0811195708">0811 195 708</a>
                    </div>
                </li>
                <li class="nav-item py-2 d-flex align-items-center justify-content-start">
                    <a href="https://www.linkedin.com/company/idea-tax/" target="_blank" rel="noopener noreferrer" class="nav--link" title="Linkedin"><i
                                class="bi bi-linkedin me-2 fs-4 text"></i></i></a>
                    <a href="https://www.instagram.com/ideatax_idn/" target="_blank" rel="noopener noreferrer" class="nav-link" title="Instagram"><i
                    class="bi bi-instagram me-2 fs-4 text"></i></a>
                    <a href="https://www.facebook.com/ideataxconsultant" target="_blank" rel="noopener noreferrer" class="nav--link" title="Facebook"><i
                                class="bi bi-facebook me-2 fs-4 text"></i></i></a>
                </li>
            </ul>
            <div class="nav-item dropdown mb-2">
                <a class="btn btn-warning dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{app()->getLocale()}}
                </a>
                <ul class="dropdown-menu style="min-width: 4em !important"">
                    @if (app()->getLocale() == "id")
                        <li>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('home') }}">
                                <span>English</span>
                                <img class="lang-flag shadow ms-1" src="/assets/images/gb.svg" alt="english flag">
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center justify-content-between active" href="{{ route('home.id') }}">
                                <span>Indonesia</span>
                                <img class="lang-flag shadow ms-1" src="/assets/images/id.svg" alt="indonesia flag">
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item d-flex align-items-center justify-content-between active" href="{{ route('home') }}">
                                <span>English</span>
                                <img class="lang-flag shadow ms-1" src="/assets/images/gb.svg" alt="english flag">
                            </a>
                        <li>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('home.id') }}">
                                <span>Indonesia</span>
                                <img class="lang-flag shadow ms-1" src="/assets/images/id.svg" alt="indonesia flag">
                            </a>
                        </li>
                        </li>
                    @endif
                </ul>
            </div>
            @if (app()->getLocale() === "id")
                @include('includes/mobileNavbarID')
            @else
                @include('includes/mobileNavbarEN')
            @endif
        </nav>
    </div>
</header>