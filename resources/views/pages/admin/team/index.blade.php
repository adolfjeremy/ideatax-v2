@extends('layouts.admin')

@section('title')
    Ideatax | Team
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Our Team</h2>
                    <p class="dashboard-subtitle">Customize your Team Member</p>
                </div>
                <a href="{{ route("team.create") }}" class="btn btn-warning">New Member</a>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-4">
                        <a href="{{ route('team.edit', $team->id) }}" class="card bg-primary p-5 mb-4 align-items-center justify-content-center text-decoration-none fs-6 text-uppercase text-light fw-bold discussion_item ">
                            {{ $team->name }}
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
                { data: 'name', name: 'name' },
                { data: 'position', name: 'position' },
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
