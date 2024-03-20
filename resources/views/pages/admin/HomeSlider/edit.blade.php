@extends('layouts.admin')

@section('title')
    Ideatax | Edit Article Category
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3">
                <h2 class="dashboard-title fs-4 fw-bold">Article Category</h2>
                <p class="dashboard-subtitle">Edit Article Category</p>
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
                            <form action="{{ route('hero-slider.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="photo" class="form-label">Thumbnail</label>
                                    @if ($item->image)
                                        <img src="{{ asset("storage/" . $item->image) }}" class="img-preview img-fluid col-sm-5 my-2 d-block">
                                    @else
                                        <img class="img-preview img-fluid col-sm-5 my-2">
                                    @endif
                                    <input type="hidden" name="oldImage" value="{{ $item->image }}">
                                    <input type="file" id="image" name="image" class="form-control w-100" value="{{ $item->image }}" onchange="previewImage()">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning d-block w-100">Save Thumbnail</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
