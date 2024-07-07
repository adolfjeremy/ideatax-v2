<header>
    <div class="nav_bar py-2">
        <div class="container d-flex align-items-center justify-content-between">
            @if (app()->getLocale() == "en")
                <a href="/" class="navbar_brand"><img src="/assets/images/logo.png" alt="Ideatax"></a>
            @else
                <a href="/id" class="navbar_brand"><img src="/assets/images/logo.png" alt="Ideatax"></a> 
            @endif
            <button id="hamburgerButton" class="d-block">
                <div class="inner-line"></div>
            </button>
        </div>
    </div>
    <div class="mobile_nav d-block">
        <nav class="d-block p-1">
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