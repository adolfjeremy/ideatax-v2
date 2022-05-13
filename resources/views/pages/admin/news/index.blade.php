@extends('layouts.admin')

@section('title')
    Ideatax | News
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">News</h2>
                <p class="dashboard-subtitle">Add, Edit or Delete News</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('news.create') }}" class="btn btn-warning">Add New News</a>
                    </div>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
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
                { data: 'news_categories_id', name: 'news_categories_id'},
                { data: 'photo', name: 'photo' },
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
