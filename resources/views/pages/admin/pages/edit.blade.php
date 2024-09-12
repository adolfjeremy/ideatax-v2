@extends('layouts.admin')

@section('title')
    Ideatax | Edit {{ $item->title }} Page Meta Tag
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">{{ $item->title }} Page</h2>
                <p class="dashboard-subtitle">Customize your {{ $item->title }} page SEO</p>
            </div>
            <div class="dashboard-content pb-4 mt-3">
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
                            <form action="{{ route('pages.update',$item->id) }}" method="POST">
                                @method("PUT")
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="SEO_title" class="form-label">SEO Title Id</label>
                                    <input type="text" id="SEO_title" name="SEO_title" class="form-control w-100" value="{{ $item->SEO_title }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title_eng" class="form-label">SEO Title Eng</label>
                                    <input type="text" id="SEO_title_eng" name="SEO_title_eng" class="form-control w-100" value="{{ $item->SEO_title_eng }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="SEO_title_jpn" class="form-label">SEO Title Jpn</label>
                                    <input type="text" id="SEO_title_jpn" name="SEO_title_jpn" class="form-control w-100" value="{{ $item->SEO_title_jpn }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label">Meta Description Id</label>
                                    <textarea name="description" id="description" class="form-control w-100" cols="30" rows="5" required>{{ $item->description }}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_eng" class="form-label">Meta Description Eng</label>
                                    <textarea name="description_eng" id="description_eng" class="form-control w-100" cols="30" rows="5" required>{{ $item->description_eng }}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description_jpn" class="form-label">Meta Description Jpn</label>
                                    <textarea name="description_jpn" id="description_jpn" class="form-control w-100" cols="30" rows="5" required>{{ $item->description_jpn }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
