@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/about.css">
    <link rel="stylesheet" href="/assets/css/pages/team.css">
@endsection

@section('title')
    Ideatax | Our Team
@endsection

@section('content')
    <section class="our_team section_header">
        <div class="overlay"></div>
        <div class="container">
            <h2>OUR TEAM</h2>
        </div>
    </section>
    <section id="ourTeamDetail" class="section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 px-3 border-lg-2 team_detail">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="profile_image_container" style="background-image: url('{{ asset("storage/" . $team->photo) }}')"></div>
                    </div>
                    <div class="row d-flex d-flex-column align-items-center justify-content-center text-center">
                        <h3>{{ $team->name }}</h3>
                        <p class="text-center">{{ $team->position }}</p>
                    </div>
                    <div class="row">
                        <div>{!! $team->biography !!}</div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="team_detail_list">
                        @foreach ($teams as $teamItem)
                            <div class="team_detail_item mt-4 mt-lg-0">
                                <a href="{{ route('our-team-detail', $teamItem->slug) }}" class="profile_image_container profile_detail" style="background-image: url('{{ asset("storage/" . $teamItem->photo) }}')"></a>
                                <a href="{{ route('our-team-detail', $teamItem->slug) }}" class="name_container mt-2 text-start">
                                    <h5 class="mb-1">{{ $teamItem->name }}</h5>
                                    <p class="mt-0">{{ $teamItem->position }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection