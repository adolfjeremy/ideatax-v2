@extends('layouts.admin')

@section('title')
    Ideatax | Consultation Meetings
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading pt-3 d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="dashboard-title fs-4 fw-bold">Consultation Meetings</h2>
                    <p class="dashboard-subtitle">Manage Consultation Meeting</p>
                </div>
            </div>
            <div class="dashboard-content mt-2">
                <div class="row">
                    @foreach ($schedules as $schedule)
                    <div class="col-4">
                        <div class="card d-flex flex-column bg-primary p-2 mb-4 align-items-center justify-content-center fs-6 text-start text-light fw-normal ">
                          <p class="m-1">{{ $schedule->name }}</p>   
                          <p class="m-1">{{ $schedule->email }}</p>   
                          <p class="m-1">{{ $schedule->phone }}</p>   
                          <p class="m-1">{{ $schedule->company }}</p>   
                          <p class="m-1">{{ $schedule->service->title }}</p>   
                          <p class="m-1">{{ $schedule->schedule }}</p>   
                          <p class="m-1">{{ $schedule->description }}</p>   
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
