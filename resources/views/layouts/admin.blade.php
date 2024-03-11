<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/global4.css">
    <link rel="stylesheet" href="/assets/css/pages/admin.css">
</head>
<body class="dashboard">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap py-2 shadow">
        <a href="" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6">
            Idea<strong>tax</strong>
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route("pages.index") }}" class="nav-link active">Pages SEO</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('team.index') }}" class="nav-link active">Team</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("services.index") }}" class="nav-link active">Our Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("articles.index") }}" class="nav-link active">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("update.index") }}" class="nav-link active">Tax Updates</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("event.index") }}" class="nav-link active">Tax Event</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("career.index") }}" class="nav-link active">Career</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("compro.index") }}" class="nav-link active">Company Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("life-at-ideatax.index") }}" class="nav-link active">Life at Ideatax</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("author.index") }}" class="nav-link active">Author</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
                @yield('content')
            </main>
        </div>
    </div>
    {{-- <main>
        <section class="admin-dashboard">
            <div class="d-flex" id="wrapper">
                <div class="border-right" id="sidebar-wrapper">
                    <div class="sidebar-heading text-center">
                        <img src="/assets/images/admin.png" alt="" class="my-4">
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route("pages.index") }}" class="list-group-item list-group-item-action{{ (request()->is('admin/pages*') ? " active" : "") }}">Static Pages</a>
                        <a href="{{ route("career.index") }}" class="list-group-item list-group-item-action{{ (request()->is('admin/career*') ? " active" : "") }}">Career</a>
                        <a href="{{ route("life-at-ideatax.index") }}" class="list-group-item list-group-item-action{{ (request()->is('admin/life-at-ideatax*') ? " active" : "") }}">Life At Ideatax</a>
                        <a href="{{ route("author.index") }}" class="list-group-item list-group-item-action{{ (request()->is('admin/author*') ? " active" : "") }}">Author</a>
                        <a href="{{ route('article-category.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/article-category*') ? " active" : "") }}">Article Category</a>
                        <a href="{{ route('tax-update-category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/tax-update-category*') ? " active" : "") }}">Tax Update Category</a>
                        <a href="{{ route('articles.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/articles*') ? " active" : "") }}">Article</a>
                        <a href="{{ route('compro.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/compro*') ? " active" : "") }}">Company Profile</a>
                        <a href="{{ route('event.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/event*') ? " active" : "") }}">Tax Event</a>
                        <a href="{{ route('update.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/update*') ? " active" : "") }}">Tax Update</a>
                        <a href="{{ route('discussion.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/discussion*') ? " active" : "") }}">Tax Consultation</a>
                        <a href="{{ route('services.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/services*') ? " active" : "") }}">Services</a>
                        <a href="{{ route('team.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/team*') ? " active" : "") }}">Team</a>
                        @can('super_admin')
                            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/user*') ? " active" : "") }}">User</a>
                        @endcan
                        <a href="#"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </div>
                </div>
                <div id="page-content-wrapper">
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-admin">
                        <div class="container-fluid">
                            <button class="btn btn-warning d-md-none ms-2" id="menu-toggle">&laquo;
                                Menu</button>
                        </div>
                    </nav>
                    @yield('content')
                </div>
            </div>
        </section>
    </main> --}}
    @stack('prepend-script')
    <script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $('#menu-toggle').click(function(e) {
            e.preventDefault();
            $('#wrapper').toggleClass("toggled");
        });
    </script>
    @stack('addon-script')
</body>

</html>