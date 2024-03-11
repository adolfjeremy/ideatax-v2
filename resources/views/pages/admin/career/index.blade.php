@extends('layouts.admin')

@section('title')
    Ideatax | Career
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Career</h2>
                    <p class="dashboard-subtitle">Create, Edit or Delete Job Openings</p>
                </div>
                <a href="{{ route("career.create") }}" class="btn btn-warning">Creat Job Opening</a>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($careers as $career)
                    <div class="col-4" title="{{ $career->title }}">
                        <a href="{{ route('career.edit', $career->id) }}" title="{{ $career->title }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {!! str_limit($career->title, $limit = 40) !!}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

