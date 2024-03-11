@extends('layouts.admin')

@section('title')
    Ideatax | Category
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid pt-3">
            <div class="dashboard-heading fs-4 fw-bold">
                <h2 class="dashboard-title">Tax Update Category</h2>
                <p class="dashboard-subtitle">Create, Edit or Delete News Category</p>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-4" title="{{ $category->title }}">
                        <a href="{{ route('tax-update-category.edit', $category->id) }}" title="{{ $category->title }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {!! str_limit($category->title, $limit = 40) !!}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
