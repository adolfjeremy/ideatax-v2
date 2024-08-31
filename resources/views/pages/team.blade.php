@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-team">
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
    <section class="team position-relative">
        <img src="/assets/images/team-hero.webp" alt="Idetax team ready to serve you" class="w-100">
        <div class="container-fluid team-heading">
            <div class="row">
                <div class="col-12">
                    <h1>{{ __('TeamPage.headingOne'); }} <br> {{ __('TeamPage.headingTwo'); }}</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="m-0">
        <div class="container-fluid">
            <div class="row team-list d-flex align-items-center justify-content-center">
                @php $increment = 0 @endphp
                @foreach ($teams as $team)
                <div class="col-4 p-0 team_item position-relative">
                    <img src="{{ asset("storage/" . $team->photo) }}" alt="{{ $team->name }}" class="w-100">
                    <div class="team_item_title d-flex flex-column item-{{ ($increment ===3 ? $increment=1 : $increment +=1) }} px-3">
                        <h2 class="position-relative">{{ $team->name }}</h2>
                        <p class="position-relative">{{ $team->position }}</p>
                    </div>
                    <a class="team_link" href="{{ app()->getLocale() == "en" ? route('our-team-detail', $team->slug) : route('our-team-detail.id', $team->slug) }}"></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection