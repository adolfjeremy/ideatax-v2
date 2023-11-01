<ul>
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link p-0{{ (request()->is('/') ? " active" : "") }}">home</a>
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
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle{{ (request()->is('careers*') ? " active" : "") }}{{ (request()->is('life-at-ideatax*') ? " active" : "") }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Career
        </a>
        <ul class="dropdown-menu">
        <li>
            <a href="{{ route('careers') }}" class="dropdown-item nav-link p-0{{ (request()->is('careers*') ? " on" : "") }}">career</a>
        </li>
        <li><a class="dropdown-item p-0{{ (request()->is('life-at-ideatax*') ? " on" : "") }}" href="{{ route('life-at-ideatax') }}">Life at Ideatax</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="{{ route('contact') }}" class="nav-link p-0{{ (request()->is('contact*') ? " active" : "") }}">contact us</a>
    </li>
</ul>