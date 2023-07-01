@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-team">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/team2.css">
@endsection

@section('meta')
    @if ($page->description)
        <meta name="description" content="{{ $page->description }}">
        <meta property="og:description" content="{{ $page->description }}">
    @else
        <meta name="description" content="With the rapid development of business, we understand your need to overcome the difficulties and complexity of the challenges you may face in business, especially related to taxation. Ideatax comes with the vision of becoming a leading tax consulting company, by providing high-quality services, and upholding the trust you have given us.">
        <meta property="og:description" content="With the rapid development of business, we understand your need to overcome the difficulties and complexity of the challenges you may face in business, especially related to taxation. Ideatax comes with the vision of becoming a leading tax consulting company, by providing high-quality services, and upholding the trust you have given us.">
    @endif
    
    <meta property="og:title" content="{{ $page->SEO_title }}">
    <meta property="og:url" content="https://ideatax.id/our-team">
    <meta property="og:type" content="article">
@endsection

@section('title')
    {{ $page->SEO_title }}
@endsection

@section('content')
    <section class="our_team_hero py-5">
        <div class="overlay"></div>
        <div class="container">
            <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <h1 data-aos="flip-left">Meet Our Team</h1>
            </div>
        </div>
    </section>
    <section id="ourTeam" class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="our_team_list pb-5 text-start" data-aos="zoom-in">
                    @php $incrementCategory = 0 @endphp
                    @foreach ($teams as $team)
                        <div class="our_team_item" style="background-image: url('{{ asset("storage/" . $team->photo) }}')">
                            <a href="{{ route('our-team-detail', $team->slug) }}"></a>
                            <p>{{ $team->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection