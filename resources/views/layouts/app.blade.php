<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index">
    <meta name="keywords" content="ideatax, idea tax, taxidea, tax idea, Konsultan Pajak, Tax Consultant, Pajak, Sengketa Pajak, Tax Dispute, Dirgen Pajak, Accounting Services, Assistance in Tax Supervision, Tax Audit Assistance, Tax Objection Assistance, Tax Appeal Assistance, Tax Judicial Review Assistance, Tax Refund Assistance, Business Structure Planning and Corporate Action Advisory, Tax Advisory in Liquidation and Bankruptcy, Transfer Pricing Documentation Preparation Local and Master File, Submission of Tax Facilities, Tax Research Collaboration and Training">
    @yield('meta')
    <meta property="og:site_name" content="Ideatax">
    @yield("canonical")
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YJ1NB0YCV4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-YJ1NB0YCV4');

    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime()
                , event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0]
                , j = d.createElement(s)
                , dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5BMXPXX');

    </script>
    <!-- End Google Tag Manager -->
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="/assets/css/header1.css" rel="stylesheet"> --}}
    @yield('page-style')
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header')
    <main class="
        {{ (request()->is('tax-update*') ? " padding_top" : "") }}
        {{ (request()->is('contact*') ? " padding_top" : "") }}
        {{ (request()->is('contact*') ? " padding_top" : "") }}
    ">
        <div class="floating_button" title="contact us via whatsapp">
            <i class="bi bi-whatsapp floating_button_icon"></i>
        </div>
        <div class="floating_whatsapp">
            <div class="floating_whatsapp_header py-2 px-3">
                <i class="bi bi-whatsapp"></i>
                <p>Hello, is there anything we can help?</p>
            </div>
            <div class="floating_whatsapp_content p-3">
                <a href="https://wa.me/62811195708?text=Hello%20Ideatax" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-between w-100 p-2 floating_whatsapp_content_wrapper">
                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <i class="bi bi-whatsapp"></i>
                        <p class="m-0">Ideatax Admin</p>
                    </div>
                    <i class="bi bi-send"></i>
                </a>
            </div>
        </div>
        @yield('content')
    </main>
</body>
<script src="/assets/js/openNavbar.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@include('includes.footer')
</html>
