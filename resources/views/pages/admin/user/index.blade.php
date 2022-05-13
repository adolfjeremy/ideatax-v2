@extends('layouts.admin')

@section('title')
    Ideatax | Admin List
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin List</h2>
                <p class="dashboard-subtitle">Create, Edit or Delete Admin Account</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('user.create') }}" class="btn btn-warning">Create New Account</a>
                    </div>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
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
                { data: 'name', name: 'name'},
                { data: 'email', name: 'email' },
                { data: 'roles', name: 'roles'},
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
