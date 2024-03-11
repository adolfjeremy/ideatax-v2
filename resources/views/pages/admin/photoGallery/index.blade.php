@extends('layouts.admin')

@section('title')
    Ideatax | Life At Ideatax Images
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Life At Ideatax Images</h2>
                    <p class="dashboard-subtitle">Add, Edit or Delete Images</p>
                </div>
                <a href="{{ route("life-at-ideatax.create") }}" class="btn btn-warning">Add Image</a>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($galleries as $galery)
                    <div class="col-4">
                        <a href="{{ route('life-at-ideatax.edit', $galery->id) }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {{ $galery->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
