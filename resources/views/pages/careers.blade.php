@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/careers.css">
@endsection

@section('content')
    <section class="career_page">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center heading">
                    <h1>{{ __('careers.heading') }}</h1>
                    <p>{{ __('careers.subheading') }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="job_openings mt-5">
        <div class="container">
            <div class="row">
                @forelse ($careers as $career)
                    <div class="col-12 col-md-3 col-lg-4 mt-2 mb-2">
                        <a href="{{ route('careers-detail',$career->slug) }}" class="card">
                            <h2>
                                {{ $career->title }}
                            </h2>
                            <span>More Details &#8594;</span>
                        </a>
                    </div>
                @empty
                    
                @endforelse
            </div>    
        </div>    
    </section> 
@endsection