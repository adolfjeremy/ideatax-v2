@extends('layouts.admin')

@section('title')
    Ideatax | Company Profile
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Company Profile</h2>
                    <p class="dashboard-subtitle">Add, Edit or Delete Company Profile</p>
                </div>
                <a href="{{ route("compro.create") }}" class="btn btn-warning">Add Compro</a>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($compros as $compro)
                    <div class="col-4">
                        <a href="{{ route('compro.edit', $compro->id) }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            Company Profile
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
