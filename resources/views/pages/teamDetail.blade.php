@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/team2.css">
@endsection

@section('title')
    {{ $team->name }} | Ideatax
@endsection

@section('content')
    <section class="our_team_detail py-4">
        <div class="overlay"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-md-start">
                <div class="col-6 col-md-3">
                    <div class="our_team_detail_image" data-aos="fade-right">
                        <img src="{{ asset("storage/" . $team->profile_picture) }}" alt="{{ $team->name }} Profile Picture" title="{{ $team->name }}" class="w-100">
                    </div>
                </div>
                <div class="col-12 col-md-3 name_contacts align-items-center align-items-md-start" data-aos="fade-right" data-aos-delay="100">
                    <div class="name_position text-center text-md-start">
                        <h1>{{ $team->name }}</h1>
                        <span>{{ $team->position }}</span>
                    </div>
                    <div class="contacts">
                        <ul class="d-flex">
                            @if ($team->phone)
                                 <li><a href="tel:{{ $team->phone }}"><i class="bi bi-telephone"></i></a></li>
                            @endif
                            <li><a href="mailto:{{ $team->email }}"><i class="bi bi-envelope"></i></a></li>
                            @if ($team->linkedin)
                                <li><a href="{{ $team->linkedin }}" target="_blank" rel="noopener"
                            rel=”noreferrer”><i class="bi bi-linkedin"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_team_description py-4" data-aos="fade-down">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ route("our-team") }}">Team</a></li>
                        <li class="breadcrumb-item breadcrumb-cst active" aria-current="page">{{ $team->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9 px-3 team_detail">
                    <div class="row d-flex d-flex-column align-items-start justify-content-center text-start">
                        <h2>Biography</h2>
                        <div>{!! $team->biography !!}</div>
                    </div>
                    <div class="row d-flex d-flex-column align-items-start justify-content-center text-start mt-4">
                        <h2>Area of Expertise</h2>
                        <div>{!! $team->area_of_expertise !!}</div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="team_list">
                        @foreach ($teams as $teamItem)
                            <div class="team_item mt-4 mt-lg-0">
                                <a href="{{ route('our-team-detail', $teamItem->slug) }}" class="profile_image_container profile_detail" style="background-image: url('{{ asset("storage/" . $teamItem->profile_picture) }}')"></a>
                                <a href="{{ route('our-team-detail', $teamItem->slug) }}" class="name_container mt-2">
                                    <h2 class="m-0">{{ $teamItem->name }}</h2>
                                    <p class="m-0">{{ $teamItem->position }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection