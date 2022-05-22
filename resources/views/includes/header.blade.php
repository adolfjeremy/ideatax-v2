<header class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
        <a href="/" class="navbar_brand">Idea<strong>tax</strong></a>
        <button id="hamburgerButton" class="d-sm-block d-lg-none">
            <div class="inner-line"></div>
        </button>
        <nav>
            <ul>
                <li class="nav-item mobile_navbar_brand">
                    <a href="/" class="navbar_brand nav-link nav-link-custom">Idea<strong>tax</strong></a>
                </li>
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link nav-link-custom{{ (request()->is('/*') ? " active" : "") }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-custom dropdown-toggle {{ (request()->is('about*') ? " active" : "") }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About
                    </a>
                    <ul class="dropdown-menu border-0" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item custom-dropdown-item{{ (request()->is('about') ? " active" : "") }}" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="dropdown-item custom-dropdown-item{{ (request()->is('about/our-team*') ? " active" : "") }}" href="{{ route('our-team') }}">Our Team</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link nav-link-custom{{ (request()->is('our-services*') ? " active" : "") }}" href="{{ route('our-services') }}">Our Services</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom{{ (request()->is('tax-update*') ? " active" : "") }}" href="{{ route('update') }}">Updates</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom{{ (request()->is('articles*') ? " active" : "") }}" href="{{ route('articles') }}">Articles</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom{{ (request()->is('contact*') ? " active" : "") }}" href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>