@extends('layouts.admin')

@section('title')
    Ideatax | Tax Event
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Tax Events</h2>
                    <p class="dashboard-subtitle">Create, Edit or Delete Tax Events</p>
                    <div class="input-group mb-3">
                        <form action="{{ route("event.index") }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="Search tax event" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <button class="btn btn-warning" type="submit" id="button-addon1">search</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3">
                    <a href="{{ route("event.create") }}" class="btn btn-warning">
                    Create Tax Event
                    </a>
                </div>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($events as $event)
                    <div class="col-4" title="{{ $event->title }}">
                        <a href="{{ route('event.edit', $event->id) }}" title="{{ $event->title }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {!! str_limit($event->title, $limit = 40) !!}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
