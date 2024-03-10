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
    <li class="nav-item">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-search fs-4 text"></i></button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header border-0 p-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="px-4">
                    <form action="{{ route("search") }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="query" class="form-control" placeholder="Search articles and tax updates" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <button class="btn btn-warning" type="button" id="button-addon1">Search</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </li>
</ul>