@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-team">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/team3.css">
@endsection

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $page->description_eng }}">
        <meta property="og:description" content="{{ $page->description_eng }}">
        <meta property="og:title" content="{{ $page->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $page->description }}">
        <meta property="og:description" content="{{ $page->description }}">
        <meta property="og:title" content="{{ $page->SEO_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/our-team">
    <meta property="og:type" content="article">
@endsection

@section('title')
    @if (app()->getLocale() == "en")
        {{ $page->SEO_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $page->SEO_title }}
    @endif
@endsection

@section('content')
    <section class="our_team_hero py-5">
        <div class="overlay"></div>
        <div class="container">
            <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <h1>{{ __('home.teamHeader') }}</h1>
            </div>
        </div>
    </section>
    <section id="ourTeam" class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="our_team_list pb-5 text-start">
                    @php $incrementCategory = 0 @endphp
                    @foreach ($teams as $team)
                        <div class="our_team_item" style="background-image: url('{{ asset("storage/" . $team->photo) }}')">
                            <a href="{{ app()->getLocale() == "en" ? route('our-team-detail', $team->slug) : route('our-team-detail.id', $team->slug) }}"></a>
                            <p>{{ $team->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection