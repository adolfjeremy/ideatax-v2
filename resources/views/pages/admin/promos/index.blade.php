@extends('layouts.admin')

@section('title')
    Ideatax | Promotions
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Promotion</h2>
                    <p class="dashboard-subtitle">Add, Edit or Delete Promotion</p>
                </div>
                <a href="{{ route("promo.create") }}" class="btn btn-warning">Add Promotion</a>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($promotions as $item)
                    <div class="col-4">
                        <a href="{{ route('promo.edit', $item->id) }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {{ $item->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
