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
                        <a href="tel:0212528471">(021) 2528471</a>
                        <span class="mx-1">,</span>
                        <a href="tel:0811195708">0811 195 708</a>
                        </div>
                        <div class="dropdown ms-3">
                            <a class="btn btn-warning dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if (session()->get('applocale'))
                                    {{session()->get('applocale')}}
                                @else
                                    ID
                                @endif
                            </a>
                            <ul class="dropdown-menu" style="min-width: 4em !important">
                                @if (session()->get('applocale') == "id")
                                    <li><a class="dropdown-item" href="{{ route('lang.switch', "en") }}">EN</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('lang.switch', "id") }}">ID</a></li>
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
            <a href="/" class="navbar_brand">Idea<strong>tax</strong></a>
            <button id="hamburgerButton" class="d-block d-xl-none">
                <div class="inner-line"></div>
            </button>
            <nav class="reponsive_nav d-flex d-none d-xl-block">
                <ul>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link p-0{{ (request()->is('/*') ? " active" : "") }}">home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('our-team') }}" class="nav-link p-0{{ (request()->is('our-team*') ? " active" : "") }}">team</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('our-services') }}" class="nav-link p-0{{ (request()->is('our-services*') ? " active" : "") }}">our services</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('update') }}" class="nav-link p-0{{ (request()->is('tax-update*') ? " active" : "") }}">updates</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('articles') }}" class="nav-link p-0{{ (request()->is('articles*') ? " active" : "") }}">articles</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link p-0{{ (request()->is('contact*') ? " active" : "") }}">contact us</a>
                    </li>
                </ul>
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
    {{-- <div class="mobile_nav d-block d-xl-none shadow-lg">
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
                        <a href="tel:0212528471">(021) 2528471</a>
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
                <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{session()->get('applocale')}}
                </a>
                <ul class="dropdown-menu" style="min-width: 3em !important">
                    @if (session()->get('applocale') == "id")
                        <li><a class="dropdown-item" href="{{ route('lang.switch', "id") }}">EN</a></li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('lang.switch', "en") }}">ID</a></li>
                    @endif
                </ul>
            </div>
            <ul class="d-block p-1 border-top">
                <li>
                    <a href="/" class="navbar_brand">Idea<strong>tax</strong></a>
                </li>
                <li class="nav-item py-2">
                    <a href="{{ route('home') }}" class="nav-link{{ (request()->is('/*') ? " active" : "") }}">home</a>
                </li>
                <li class="nav-item py-2">
                    <a href="{{ route('our-team') }}" class="nav-link{{ (request()->is('our-team*') ? " active" : "") }}">team</a>
                </li>
                <li class="nav-item py-2">
                    <a href="{{ route('our-services') }}" class="nav-link{{ (request()->is('our-services*') ? " active" : "") }}">our services</a>
                </li>
                <li class="nav-item py-2">
                    <a href="{{ route('update') }}" class="nav-link{{ (request()->is('tax-update*') ? " active" : "") }}">updates</a>
                </li>
                <li class="nav-item py-2">
                    <a href="{{ route('articles') }}" class="nav-link{{ (request()->is('articles*') ? " active" : "") }}">articles</a>
                </li>
                <li class="nav-item py-2">
                    <a href="{{ route('contact') }}" class="nav-link{{ (request()->is('contact*') ? " active" : "") }}">contact us</a>
                </li>
            </ul>
        </nav>
    </div> --}}
</header>