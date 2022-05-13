@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/ourServices.css">
@endsection

@section('title')
    Ideatax | {{ $services->title }}
@endsection

@section('content')
<section class="our-services-detail my-3">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-10 col-lg-6 detail_container p-4 shadow-lg">
                <h3 class="text-center">{{ $services->title }}</h3>
                <div class="text_container">{!! $services->description !!}</div>
                <div class="text-center text-md-start">
                    <a href="{{ route('contact') }}" class="btn btn-md btn-warning px-4 mt-3 me-lg-2">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection