@extends('layouts.admin')

@section('title')
    Ideatax | Company Profile Downloader
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Company Profile Downloader</h2>
                </div>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($items as $item)
                    <div class="col-4">
                        <div class="card d-flex flex-column bg-primary p-2 mb-4 align-items-center justify-content-center fs-6 text-start text-light fw-normal ">
                          <p class="m-1">{{ $item->name }}</p>   
                          <p class="m-1">{{ $item->email }}</p>   
                          <p class="m-1">{{ $item->tel }}</p>   
                          <p class="m-1">{{ $item->company }}</p> 
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
