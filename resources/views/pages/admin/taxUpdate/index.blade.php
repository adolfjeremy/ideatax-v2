@extends('layouts.admin')

@section('title')
    Ideatax | Tax Updates
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Tax Updates</h2>
                    <p class="dashboard-subtitle">Create, Edit or Delete Tax Updates</p>
                    <div class="input-group mb-3">
                        <form action="{{ route("update.index") }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="Search tax updates" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <button class="btn btn-warning" type="submit" id="button-addon1">search</button>
                        </form>
                    </div>
                    <div class="input-group mb-3">
                        <form action="{{ route("update.index") }}" method="GET" class="d-flex">
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option value="" selected>Filter by category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-warning" type="submit" id="button-addon1">search</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3">
                    <a href="{{ route("update.create") }}" class="btn btn-warning">
                    Create Tax Update
                    </a>
                    <a href="{{ route("tax-update-category.index") }}" class="btn btn-warning">
                        Category List
                    </a>
                </div>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($updates as $update)
                    <div class="col-4" title="{{ $update->title }}">
                        <a href="{{ route('update.edit', $update->id) }}" title="{{ $update->title }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {!! str_limit($update->title, $limit = 40) !!}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
