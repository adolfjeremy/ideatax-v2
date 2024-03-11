@extends('layouts.admin')

@section('title')
    Ideatax | Services
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading mt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Our Services</h2>
                    <p class="dashboard-subtitle">Add, Edit or Delete Services</p>
                    <div class="input-group mb-3">
                        <form action="{{ route("services.index") }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="Search services" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <button class="btn btn-warning" type="submit" id="button-addon1">search</button>
                        </form>
                    </div>
                </div>
                <a href="{{ route("services.create") }}" class="btn btn-warning">
                    New Service
                </a>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-4">
                        <a href="{{ route('services.edit', $service->id) }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {{ $service->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

