@extends('layouts.admin')

@section('title')
    Ideatax | Article
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Static Pages</h2>
                <p class="dashboard-subtitle">Customize your static pages meta tag</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    @foreach ($pages as $page)
                        <div class="col-4">
                        <a href="{{ route('pages.edit', $page->id) }}" class="card p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-light fw-bold discussion_item ">
                            {{ $page->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
