@extends('layouts.admin')

@section('title')
    Ideatax | Article
@endsection

@section('content')
    <section class="section-content ">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Articles</h2>
                    <p class="dashboard-subtitle">Create, Edit or Delete Articles</p>
                    <div class="input-group mb-3">
                        <form action="{{ route("articles.index") }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="Search articles" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <button class="btn btn-warning" type="submit" id="button-addon1">search</button>
                        </form>
                    </div>
                    <div class="input-group mb-3">
                        <form action="{{ route("articles.index") }}" method="GET" class="d-flex">
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
                    <a href="{{ route("articles.create") }}" class="btn btn-warning">
                    Create Article
                    </a>
                    <a href="{{ route("article-category.index") }}" class="btn btn-warning">
                        Category List
                    </a>
                </div>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-4" title="{{ $article->title }}">
                        <a href="{{ route('articles.edit', $article->id) }}" title="{{ $article->title }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {!! str_limit($article->title, $limit = 40) !!}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
