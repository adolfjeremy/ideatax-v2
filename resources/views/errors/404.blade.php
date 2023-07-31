<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.styles')
    <link rel="stylesheet" href="/assets/css/pages/404.css">
    <title>Page Not Found | Ideatax</title>
</head>
<body>
    @include('includes.header')
    <main>
        <section class="error-page">
        <div class="container">
            <div class="text-wrapper">
                <h1>This page could not be found!</h1>
                <p>We are sorry. But the page you are looking for is not available.</p>
                <a href="{{ route("home") }}" class="btn btn-warning btn-md">back to homepage</a>
            </div>
        </div>
    </section>
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
    </main>
    
    {{-- @include('includes.footer') --}}
    
    @include('includes.script')
    <script src="/assets/js/floatingButton.js"></script>
</body>
</html>