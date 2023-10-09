<ul>
    <li class="nav-item">
        <a href="{{ route('home.id') }}" class="nav-link p-0{{ (request()->is('id') ? " active" : "") }}">home</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('our-team.id') }}" class="nav-link p-0{{ (request()->is('id/our-team*') ? " active" : "") }}">team</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('our-services.id') }}" class="nav-link p-0{{ (request()->is('id/our-services*') ? " active" : "") }}">our services</a>
    </li>
</ul>