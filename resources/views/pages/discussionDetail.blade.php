@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news.css">
    <link rel="stylesheet" href="/assets/css/pages/newsDetail.css">
@endsection

@section('title')
    {{ $customerQuestion->title }} | Ideatax
@endsection

    
@section('content')
    <section id="categoriesList">
        <div class="container">
            <div class="row">
                <ul>
                    @foreach ($taxUpdateCategories as $taxUpdateCategory)
                        <li>
                            <a href="{{ route('tax-update-category', $taxUpdateCategory->slug) }}">{{ $taxUpdateCategory->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <section id="newsDetail" class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <img src="{{ asset("storage/" . $customerQuestion->photo) }}" alt="{{ $customerQuestion->title }}" class="w-100">
                    </div>
                    <div class="row mt-2 news_title">
                        <h1>{{ $customerQuestion->title }}</h1>
                        <span>{{ $customerQuestion->created_at->format('Y/m/d H:i') }} WIB</span>
                    </div>
                    <div class="row mt-2">
                        <h5>Question by {{ $customerQuestion->name }} :</h5>
                        <p class="news_body">{!! $customerQuestion->question !!}</p>
                    </div>
                    <div class="row mt-1">
                        <h5>Answer:</h5>
                        <div class="news_body">{!! $customerQuestion->answer !!}</div>
                    </div>
                </div>
                <div id="sideNews" class="col-12 col-lg-4">
                    <div class="row inquiry-form">
                        <div id="customerQuestions" class="col-12">
                            <div class="row text-center header">
                                <h2 class="py-3">Inquiry Form</h2>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <form action="{{ route('update-save') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12 my-3">
                                        <input type="text" id="name" name="name" class="form-control w-100" placeholder="Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" id="email" name="email" class="form-control w-100" placeholder="Email" required>
                                    </div>
                                    <input type="hidden" id="status" name="status" class="form-control w-100" value="UNANSWERED" required>
                                    <div class="col-12 mb-3 d-flex flex-column">
                                        <textarea name="question" id="editor" class="form-control w-100" placeholder="Question" required></textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <button type="submit" class="btn btn-warning d-block w-100">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="newsContainer" class="row">
                <div class="col-12">
                    <div class="row mt-3">
                        <h3>Latest Updates</h3>
                    </div>
                    <div class="row mb-4">
                        <div class="news_list">
                            @forelse ($taxUpdates as $taxUpdate)
                                <div class="news_item">
                                    <div class="news_image_container">
                                        <a href="{{ route('tax-update-detail',$taxUpdate->slug) }}">
                                            <img src="{{ asset("storage/" . $taxUpdate->photo) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="text_container">
                                        <a href="{{ route('tax-update-detail',$taxUpdate->slug) }}">{!! str_limit($taxUpdate->title,
                                            $limit = 61) !!}</a>
                                        <div class="timestamp">
                                            <a href="{{  route('tax-update-category',$taxUpdate->taxUpdateCategory->slug)  }}" class="news_category">{{ $taxUpdate->taxUpdateCategory->title }}</a>
                                            <span>{{ $taxUpdate->created_at->format('Y/m/d') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    No Other Updates
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div id="newsContainer" class="row mb-4 mt-3">
                <div class="col-12">
                    <div class="row">
                        <div class="header_container text-start mb-2">
                            <h3>Tax Consulting</h3>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="discussion_list">
                            @forelse ($customerQuestions as $customerQuestion)
                                <div class="discussion_item">
                                    <div class="image-container w-100">
                                        <a href=""><img src="{{ asset("storage/" . $customerQuestion->photo) }}" alt="" class="w-100"></a>
                                    </div>
                                    <div class="caption_container px-2">
                                        <a href="{{ route('tax-update-category',$customerQuestion->taxUpdateCategory->slug) }}" class="text-warning">{{ $customerQuestion->taxUpdateCategory->title }}</a>
                                        <a href="">{{ $customerQuestion->title }}</a>
                                        <span>{{ $customerQuestion->created_at->format('Y/m/d H:i') }} WIB</span>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    There is No Other Data 
                                </div>
                            @endforelse
                        </div>
                        {{ $customerQuestions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection