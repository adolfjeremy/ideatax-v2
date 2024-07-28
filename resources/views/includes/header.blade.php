<header class="navbar-fixed-top fixed-top pt-5">
    <div class="nav_bar">
        <div class="d-flex align-items-center {{ (request()->is('our-team') ? "justify-content-end" : (request()->is('id/our-team') ? "justify-content-end" : "justify-content-between")) }}">
            @if (!(request()->is('our-team')) and !(request()->is('id/our-team')))
                @if (app()->getLocale() == "en")
                <a href="/" class="navbar_brand">
                    @if ((request()->is('/')))
                        <img src="/assets/images/logo-clear.png" alt="Ideatax">
                    @else
                        <img src="/assets/images/logo.png" alt="Ideatax">
                    @endif
                </a>
                @else
                <a href="/id" class="navbar_brand">
                    @if ((request()->is('/')))
                        <img src="/assets/images/logo-clear.png" alt="Ideatax">
                    @else
                        <img src="/assets/images/logo.png" alt="Ideatax">
                    @endif
                </a>
                @endif
            @endif
            <button id="hamburgerButton" class="d-block {{ (request()->is('/')) ? "white-bg" :"" }}">
                <div class="inner-line"></div>
            </button>
        </div>
    </div>
    <div class="bg_anim"></div>
    <div class="mobile_nav">
        <nav class="d-block">
            @if (app()->getLocale() === "id")
                @include('includes/mobileNavbarID')
            @else
                @include('includes/mobileNavbarEN')
            @endif
            <div class="nav-item dropdown mb-2">
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
        </nav>
    </div>
</header>