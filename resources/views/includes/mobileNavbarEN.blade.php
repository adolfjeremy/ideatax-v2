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
            <a href="{{ route('careers') }}" class="nav-link{{ (request()->is('careers*') ? " active" : "") }}">career</a>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('contact') }}" class="nav-link{{ (request()->is('contact*') ? " active" : "") }}">contact us</a>
    </li>
</ul>