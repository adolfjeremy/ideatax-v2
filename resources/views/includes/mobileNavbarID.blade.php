<ul class="link_list">
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
    <li class="nav-item dropdown dropdown-mobile-custom py-2">
        <a class="nav-link dropdown-toggle {{ (request()->is('id/careers*') ? " active" : "") }}{{ (request()->is('id/life-at-ideatax*') ? " active" : "") }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Career
        </a>
        <ul class="dropdown-menu" style="left:15px!important">
        <li>
            <a href="{{ route('careers.id') }}" class="dropdown-item py-2{{ (request()->is('id/careers*') ? " on" : "") }}">career</a>
        </li>
        <li><a class="dropdown-item py-2{{ (request()->is('id/life-at-ideatax*') ? " on" : "") }}" href="{{ route('life-at-ideatax.id') }}">Life at Ideatax</a></li>
        </ul>
    </li>
    <li class="nav-item py-2">
        <a href="{{ route('contact.id') }}" class="nav-link{{ (request()->is('id/contact*') ? " active" : "") }}">contact us</a>
    </li>
</ul>