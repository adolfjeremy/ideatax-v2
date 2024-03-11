@extends('layouts.admin')

@section('title')
    Ideatax | Edit Service
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Services</h2>
                <p class="dashboard-subtitle">Edit Your Service</p>
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
                            <form action="{{ route('services.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <input type="hidden" name="currentOrder" class="form-control w-100" value="{{ $item->order }}" required>
                                <div class="col-12 mb-3">
                                    <label for="order" class="form-label">No</label>
                                    <input type="text" id="order" name="order" class="form-control w-100" value="{{ $item->order }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title" class="form-label">Service Name Id</label>
                                    <input type="text" id="title" name="title" class="form-control w-100" value="{{ $item->title }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="title_eng" class="form-label">Service Name Eng</label>
                                    <input type="text" id="title_eng" name="title_eng" class="form-control w-100" value="{{ $item->title_eng }}" required>
                                </div>
                                <div class="col-12 mb-3 d-flex flex-column">
                                    <label for="description">Description Id</label>
                                    <textarea name="description" rows="10" required>{{ $item->description }}</textarea>
                                </div>
                                <div class="col-12 mb-3 d-flex flex-column">
                                    <label for="description_eng">Description Eng</label>
                                    <textarea name="description_eng" rows="10" required>{{ $item->description_eng }}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title" class="form-label">SEO Title Id</label>
                                    <input type="text" id="SEO_title" name="SEO_title" class="form-control w-100" value="{{ $item->SEO_title }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title_eng" class="form-label">SEO Title Eng</label>
                                    <input type="text" id="SEO_title_eng" name="SEO_title_eng" class="form-control w-100" value="{{ $item->SEO_title_eng }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label">Meta Description Id</label>
                                    <textarea name="description" id="description" class="form-control w-100" cols="30" rows="5" required>
                                        {{ $item->meta_description }}
                                    </textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_eng" class="form-label">Meta Description Eng</label>
                                    <textarea name="description_eng" id="description_eng" class="form-control w-100" cols="30" rows="5" required>
                                        {{ $item->meta_description_eng }}
                                    </textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Save Service</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
