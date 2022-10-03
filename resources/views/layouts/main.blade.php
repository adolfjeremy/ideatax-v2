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
    <meta property="og:description" content="We combine a long running experience in tax consulting and tax authority to deliver thorough solutions to our clients. We also present essential approaches with problem-solving capabilities imbued with a full commitment for the most polished quality of service for our clients. Ideatax presents a comprehensive, prudent, and creative services to solve your tax challenges. We focus on helping your business grow and achieve its goals. Our day-to-day activities focus on the way we maintain a strong relationship and your trust, as well as actively providing thoughtful tax solutions in helping you to manage your tax risks.">
    <meta property="description" content="We combine a long running experience in tax consulting and tax authority to deliver thorough solutions to our clients. We also present essential approaches with problem-solving capabilities imbued with a full commitment for the most polished quality of service for our clients. Ideatax presents a comprehensive, prudent, and creative services to solve your tax challenges. We focus on helping your business grow and achieve its goals. Our day-to-day activities focus on the way we maintain a strong relationship and your trust, as well as actively providing thoughtful tax solutions in helping you to manage your tax risks.">
    <meta property="og:url" content="https://www.ideatax.id">
    <meta name="keywords" content="ideatax, idea tax, taxidea, tax idea, Konsultan Pajak, Tax Consultant, Pajak, Sengketa Pajak, Tax Dispute, Dirgen Pajak, Accounting Services, Assistance in Tax Supervision, Tax Audit Assistance, Tax Objection Assistance, Tax Appeal Assistance, Tax Judicial Review Assistance, Tax Refund Assistance, Business Structure Planning and Corporate Action Advisory, Tax Advisory in Liquidation and Bankruptcy, Transfer Pricing Documentation Preparation Local and Master File, Submission of Tax Facilities, Tax Research Collaboration and Training">
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
    @stack('script')
</body>

</html>