<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.styles')
    @yield('page-style')
    <title>@yield('title')</title>
</head>
<body>
    <main>
        @yield('content')
    </main>
    
   <script src="/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>