@extends('layouts.admin')

@section('title')
    Ideatax | Edit Company Stat
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Company Stat</h2>
                <p class="dashboard-subtitle">Edit {{ $item->head_eng }}</p>
            </div>
            <div class="dashboard-content pb-3 mt-4">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach    
                            </ul>    
                        </div>                        
                        @endif
                        <div class="row d-flex justify-content-center">
                            <form action="{{ route('stat.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control w-100" value="{{ $item->head }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title_eng" class="form-label">Title Eng</label>
                                    <input type="text" id="title_eng" name="head_eng" class="form-control w-100" value="{{ $item->head_eng }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="titlejpn" class="form-label">Title Jpn</label>
                                    <input type="text" id="titlejpn" name="head_jpn" class="form-control w-100" value="{{ $item->head_jpn }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="value" class="form-label">Value</label>
                                    <input type="number" id="value" name="value" class="form-control w-100" value="{{ $item->value }}" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Save Stats</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
