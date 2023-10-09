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
    <li class="nav-item">
        <a href="{{ route('careers') }}" class="nav-link p-0{{ (request()->is('careers*') ? " active" : "") }}">career</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('contact') }}" class="nav-link p-0{{ (request()->is('contact*') ? " active" : "") }}">contact us</a>
    </li>
</ul>