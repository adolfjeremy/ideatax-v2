<ul class="link_list">
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
    <li class="nav-item dropdown dropdown-mobile-custom py-2">
        <a class="nav-link dropdown-toggle{{ (request()->is('careers*') ? " active" : "") }}{{ (request()->is('life-at-ideatax*') ? " active" : "") }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Career
        </a>
        <ul class="dropdown-menu" style="left:15px!important">
        <li>
            <a href="{{ route('careers') }}" class="dropdown-item py-2{{ (request()->is('careers*') ? " on" : "") }}">career</a>
        </li>
        <li><a class="dropdown-item py-2{{ (request()->is('life-at-ideatax*') ? " on" : "") }}" href="{{ route('life-at-ideatax') }}">Life at Ideatax</a></li>
        </ul>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('contact') }}" class="nav-link{{ (request()->is('contact*') ? " active" : "") }}">contact us</a>
    </li>
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
</ul>