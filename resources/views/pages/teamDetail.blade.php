@extends('layouts.app')

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $team->description_eng }}">
        <meta property="og:description" content="{{ $team->description_eng }}">
        <meta property="og:title" content="{{ $team->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $team->description }}">
        <meta property="og:description" content="{{ $team->description }}">
        <meta property="og:title" content="{{ $team->SEO_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/our-team/{{ $team->slug }}">
    <meta property="og:type" content="article">
@endsection


@section('title')
    @if (app()->getLocale() == "en")
        {{ $team->SEO_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $team->SEO_title }}
    @endif
    
@endsection

@section('content')
<section class="team_detail position-relative">
   <img src="{{ asset("storage/" . $team->profile_picture) }}" alt="Idetax team ready to serve you" class="w-100">
   <div class="container team-heading">
       <div class="row d-flex align-items-center justify-content-end">
           <div class="col-md-6 col-12 padding_top d-flex align-items-center justify-content-end me-4 me-md-0">
               <div class="text-center">
                    <h1>{{ $team->name }}</h1>
                    <p>{{ $team->position }}</p>
               </div>
           </div>
       </div>
   </div>
</section>
    <section class="our_team_description py-4 ">
        <div class="container">
            <div class="row pt-5 px-md-5 px-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ app()->getLocale() == "en" ? route('our-team') : route('our-team.id') }}">Team</a></li>
                        <li class="breadcrumb-item breadcrumb-cst active" aria-current="page">{{ $team->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row px-md-5">
                <div class="col-12 mt-2 px-md-4 team_detail">
                    <div class="row d-flex flex-column align-items-start justify-content-center text-center">
                        <h2 class="mb-4">Biography</h2>
                        @if (app()->getLocale() == "en")
                            <div>{!! $team->biography_eng !!}</div>
                        @endif
                        @if (app()->getLocale() == "id")
                            <div>{!! $team->biography !!}</div>
                        @endif
                    </div>
                    <div class="row d-flex flex-column align-items-start justify-content-center text-center mt-4">
                        <h2 class="mb-4">Area of Expertise</h2>
                        @if (app()->getLocale() == "en")
                            <div>{!! $team->area_of_expertise_eng !!}</div>
                        @endif
                        @if (app()->getLocale() == "id")
                            <div>{!! $team->area_of_expertise !!}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row consultation_cta mt-5">
                <div class="col-12">
                    <a href="@if (app()->getLocale() == "en") {{ route("contact") }} @else {{ route("contact") }} @endif">Consultation Now <img src="/assets/images/arrow.svg" class="ms-2" alt="arrow"></a>
                </div>
            </div>
        </div>
    </section>
@endsection