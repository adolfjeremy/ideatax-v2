<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index">
    <meta property="og:title" content="Ideatax">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Ideatax">
    <meta property="og:description" content="We focus on helping your business grow and achieve its goals. Our day-to-day activities are focused on how we maintain strong relationships and maintain your trust, as well as provide thoughtful solutions to help manage your tax risks and meet beyond your expectations.">
    <meta property="description" content="We focus on helping your business grow and achieve its goals. Our day-to-day activities are focused on how we maintain strong relationships and maintain your trust, as well as provide thoughtful solutions to help manage your tax risks and meet beyond your expectations.">
    <meta property="og:url" content="https://www.ideatax.id">
    <meta name="keywords" content="Ideatax ,Idea Tax ,TaxIdea ,Tax Idea ,Konsultan Pajak, Tax Consultant, Pajak, Sengketa Pajak, Tax Dispute, Dirgen Pajak">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YJ1NB0YCV4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-YJ1NB0YCV4');
    </script>
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    @include('includes.styles')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @yield('page-style')
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
    
    @include('includes.script')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>