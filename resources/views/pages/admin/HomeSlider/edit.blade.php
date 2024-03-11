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
                                    <label for="service_id" class="form-label">Article Category Title</label>
                                    <select class="form-select" aria-label="Default select example" name="service_id" id="service_id">
                                        <option>Open this select menu</option>
                                        @foreach ($services as $service)
                                            <option @if($item->service_id == $service->id) selected @endif value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
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
