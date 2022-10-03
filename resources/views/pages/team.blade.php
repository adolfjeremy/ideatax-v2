@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/team1.css">
@endsection

@section('title')
    Our Team | Ideatax
@endsection

@section('content')
    <section class="our_team_hero py-5">
        <div class="overlay"></div>
        <div class="container">
            <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <h2 data-aos="flip-left">Meet Our Team</h2>
                <div class="d-flex button-container" data-aos="flip-right" data-aos-delay="200">
                    <a href="{{ route('contact') }}" class="btn btn-lg btn-warning">Get Started</a>
                    <a href="{{ route('our-services') }}" class="btn btn-lg btn-outline-light ms-3">Our Services</a>
                </div>
            </div>
        </div>
    </section>
    <section id="ourTeam" class="py-4 mt-5">
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