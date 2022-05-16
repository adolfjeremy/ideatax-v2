<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/pages/admin.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
</head>

<body>
    <main>
        <section class="admin-dashboard">
            <div class="d-flex" id="wrapper">
                <div class="border-right" id="sidebar-wrapper">
                    <div class="sidebar-heading text-center">
                        <img src="/assets/images/admin.png" alt="" class="my-4">
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/category*') ? " active" : "") }}">News Category</a>
                        <a href="{{ route('tax-update-category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/tax-update-category*') ? " active" : "") }}">Tax Update Category</a>
                        <a href="{{ route('news.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/news*') ? " active" : "") }}">News</a>
                        <a href="{{ route('event.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/event*') ? " active" : "") }}">Tax Event</a>
                        <a href="{{ route('update.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/update*') ? " active" : "") }}">Tax Update</a>
                        <a href="{{ route('discussion.index') }}" class="list-group-item list-group-item-action{{ (request()->is('admin/discussion*') ? " active" : "") }}">Discussion</a>
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
    </main>
    @stack('prepend-script')
    <script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $('#menu-toggle').click(function(e) {
            e.preventDefault();
            $('#wrapper').toggleClass("toggled");
        });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    @stack('addon-script')
</body>

</html>