<ul class="d-block p-1 border-top">
    <li>
        <a href="/id" class="navbar_brand">Idea<strong>tax</strong></a>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('home.id') }}" class="nav-link{{ (request()->is('id') ? " active" : "") }}">home</a>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('our-team.id') }}" class="nav-link{{ (request()->is('id/our-team*') ? " active" : "") }}">team</a>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('our-services.id') }}" class="nav-link{{ (request()->is('id/our-services*') ? " active" : "") }}">our services</a>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('update.id') }}" class="nav-link{{ (request()->is('id/tax-update*') ? " active" : "") }}">updates</a>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('articles') }}" class="nav-link{{ (request()->is('articles*') ? " active" : "") }}">articles</a>
    </li>
    <li class="nav-item py-2">
            <a href="{{ route('careers.id') }}" class="nav-link{{ (request()->is('id/careers*') ? " active" : "") }}">career</a>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('contact.id') }}" class="nav-link{{ (request()->is('id/contact*') ? " active" : "") }}">contact us</a>
    </li>
</ul>