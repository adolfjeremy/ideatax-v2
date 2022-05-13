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
    <section id="ourTeam" class="section_gap">
    <div class="container">
            <div class="row">
                <div class="our_team_list">
                    @php $incrementCategory = 0 @endphp
                    @forelse ($teams as $team)
                        <div class="our_team_item" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                            <a href="{{ route('our-team-detail', $team->slug) }}" class="profile_image_container" @if ($team->photo)
                                style="background-image: url('{{ asset("storage/" . $team->photo) }}')"
                            @endif></a>
                            <a href="{{ route('our-team-detail', $team->slug) }}" class="name_container">
                                <h3 class="mb-1">{{ $team->name }}</h3>
                                <p class="mt-0">{{ $team->position }}</p>
                            </a>
                        </div>
                    @empty
                        <div class="our_team_item">
                            <div class="profile_image_container"></div>
                            <div class="name_container">
                                <h3 class="mb-1">No Data</h3>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection