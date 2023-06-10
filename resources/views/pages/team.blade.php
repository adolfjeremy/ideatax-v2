@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/our-team">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/team2.css">
@endsection

@section('title')
    Our Team | Ideatax
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