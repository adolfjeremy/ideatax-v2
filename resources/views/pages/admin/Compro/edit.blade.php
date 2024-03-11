@extends('layouts.admin')

@section('title')
    Ideatax | Edit Company Profile
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Company Profile</h2>
                <p class="dashboard-subtitle">Edit Company Profile</p>
            </div>
            <div class="dashboard-content mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="row d-flex justify-content-center">
                            <form method="POST" action="{{ route('compro.update', $item->id) }}" enctype="multipart/form-data" class="mt-3 w-100">
                            @method('PUT')
                            @csrf
                                <div class="mb-3">
                                    <label for="compro" class="form-label">Company Profile</label>
                                    <input id="compro" type="file" value="{{ $item->compro }}" class="form-control w-100 @error('compro') is-invalid @enderror" name="compro" required>
                                    <input id="oldcompro" type="hidden" value="{{ $item->compro }}" class="form-control w-100" name="oldcompro">
                                    @error('compro')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-warning btn-block mt-2 w-100">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
