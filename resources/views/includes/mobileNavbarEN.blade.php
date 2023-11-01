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
    <li class="nav-item dropdown dropdown-mobile-custom py-2">
        <a class="nav-link dropdown-toggle{{ (request()->is('careers*') ? " active" : "") }}{{ (request()->is('life-at-ideatax*') ? " active" : "") }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Career
        </a>
        <ul class="dropdown-menu" style="left:15px!important">
        <li>
            <a href="{{ route('careers') }}" class="dropdown-item nav-link py-2{{ (request()->is('careers*') ? " on" : "") }}">career</a>
        </li>
        <li><a class="dropdown-item py-2{{ (request()->is('life-at-ideatax*') ? " on" : "") }}" href="{{ route('life-at-ideatax') }}">Life at Ideatax</a></li>
        </ul>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('contact') }}" class="nav-link{{ (request()->is('contact*') ? " active" : "") }}">contact us</a>
    </li>
</ul>