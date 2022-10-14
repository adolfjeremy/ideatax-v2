@extends('layouts.admin')

@section('title')
    Ideatax | Company Profile
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Company Profile</h2>
                <p class="dashboard-subtitle">Create, Edit or Delete Company Profile</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('compro.create') }}" class="btn btn-warning">Add Company Profile</a>
                    </div>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                            <tr>
                                <th>Uploaded at</th>
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
                { data: 'updated_at', name: 'updated_at'},
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
