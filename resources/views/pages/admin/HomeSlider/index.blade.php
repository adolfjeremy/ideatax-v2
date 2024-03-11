@extends('layouts.admin')

@section('title')
    Ideatax | Home Slider
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Home Slider</h2>
                    <p class="dashboard-subtitle">Customize Your Home Slider</p>
                </div>
                <a href="{{ route('hero-slider.create') }}" class="btn btn-warning">
                    Select Service
                </a>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($heroes as $hero)
                    <div class="col-4">
                        <a href="{{ route('hero-slider.edit', $hero->id) }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-center text-light fw-bold discussion_item ">
                            {{ $hero->service->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('addon-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'slug', name: 'slug' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: true,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
