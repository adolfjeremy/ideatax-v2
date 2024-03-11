@extends('layouts.admin')

@section('title')
    Ideatax | Pages
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Page SEO</h2>
                <p class="dashboard-subtitle">Customize your pages SEO</p>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($pages as $page)
                        <div class="col-4">
                        <a href="{{ route('pages.edit', $page->id) }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-light fw-bold discussion_item ">
                            {{ $page->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
