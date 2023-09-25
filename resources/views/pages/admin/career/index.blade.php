@extends('layouts.admin')

@section('title')
    Ideatax | Career
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Career</h2>
                <p class="dashboard-subtitle">Add, Edit or Delete Job Openings</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('career.create') }}" class="btn btn-warning">Add New Job Opening</a>
                    </div>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
