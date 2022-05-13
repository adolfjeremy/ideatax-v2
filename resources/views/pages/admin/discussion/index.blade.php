@extends('layouts.admin')

@section('title')
    Ideatax | Discussion
@endsection

@section('content')
    <section class="section-content">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Discussion</h2>
                <p class="dashboard-subtitle">Manage Customer Question</p>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('answered') }}" class="btn btn-warning">Answered Questions</a>
                    </div>
                </div>
            </div>
            <div id="discussion" class="row mt-5">
                <div class="col-12">
                    <h3>Not answered</h3>
                </div>
                <div class="col-12">
                    <div class="discussion_list">
                        @forelse ($customerQuestions as $customerQuestion)
                            <div class="discussion_item py-3 px-2">
                                <h4>{{ $customerQuestion->name }}</h4>
                                <p class="m-0">{{ $customerQuestion->email }}</p>
                                <span>{{ $customerQuestion->created_at->format('d/m/Y') }}</span>
                                <p class="question_container mt-2">{!! str_limit($customerQuestion->question, $limit = 120) !!}</p>
                                <div class="d-grid gap-1 d-md-block button-container text-center">
                                    <a href="{{ route('discussion.edit', $customerQuestion->id) }}" class="btn btn-sm btn-success px-4 mt-1 me-lg-2">Answer</a>
                                    <form action="{{ route('discussion.destroy', $customerQuestion->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger px-4 mt-1 ms-lg-2">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                there is no discussion yet
                            </div>
                        @endforelse
                    </div>    
                </div>
            </div>
        </div>
    </section>
@endsection

                        