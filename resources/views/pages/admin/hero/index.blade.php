@extends('layouts.admin')

@section('title')
    Ideatax | Home Slider
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Home Slider</h2>
                    <p class="dashboard-subtitle">Customize Your Home Slider</p>
                </div>
                <a href="{{ route('hero.create') }}" class="btn btn-warning">
                    New Hero Slider
                </a>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($heroes as $hero)
                    <div class="col-4">
                        <a href="{{ route('hero.edit', $hero->id) }}" style="background-image: url('{{ asset("storage/" . $hero->hero) }}')" class="hero_admin card mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {{ $hero->cta}}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
