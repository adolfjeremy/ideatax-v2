@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news.css">
    <link rel="stylesheet" href="/assets/css/pages/newsDetail.css">
@endsection

@section('title')
    {{ $news->title }} | Ideatax
@endsection

    
@section('content')
    <section id="categoriesList">
        <div class="container">
            <div class="row">
                <ul>
                    @foreach ($newsCategories as $newsCategory)
                        <li>
                            <a href="{{ route('news-category', $newsCategory->slug) }}">{{ $newsCategory->title }}</a>
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
                        <img src="{{ asset("storage/" . $news->photo) }}" alt="{{ $news->title }}" class="w-100">
                    </div>
                    <div class="row mt-2 news_title">
                        <h1>{{ $news->title }}</h1>
                    </div>
                    <div class="row">
                        <p class="text-warning fs-6 fw-bolder">{{ $news->newsCategory->title }} <span class="text-dark fw-normal">- {{ $news->created_at->format('d/m/Y H:i') }} WIB</span></p>
                    </div>
                    <div class="row">
                        <div class="news_body">{!! $news->body !!}</div>
                    </div>
                </div>
                <div id="sideNews" class="col-12 col-lg-4">
                    <div class="col-12">
                        <div class="row py-1">
                            <h2>Latest Event</h2>
                        </div>
                        <div class="row">
                            <div class="tax_event_list">
                                @forelse ($taxEvents as $taxEvent)
                                <a href="{{ route('tax-event', $taxEvent->slug) }}" class="tax_event_item">
                                    <h4>{!! str_limit($taxEvent->title, $limit = 50) !!}</h4>
                                    <span>{{ $taxEvent->created_at }}</span>
                                </a>
                                @empty
                                <div class="tax_event_item text-center text-light">
                                    No event at the moment
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-12 related">
                        <div class="row mt-4 mb-1">
                            <h2>Related News</h2>
                        </div>
                        <div class="row mb-4">
                            <div class="news_detail_list">
                                @forelse ($relatedNewses as $relatedNews)
                                <div class="news_detail_item">
                                    <div class="news_image_container">
                                        <a href="{{ route('news-detail',$relatedNews->slug) }}">
                                            <img src="{{ asset("storage/" . $relatedNews->photo) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="text_container">
                                        <a href="{{ route('news-detail',$relatedNews->slug) }}">{!! str_limit($relatedNews->title,
                                            $limit = 61) !!}</a>
                                        <div class="timestamp">
                                            <a href="{{ route('news-category',$news->newsCategory->slug) }}" class="news_category">{{ $relatedNews->newsCategory->title }}</a>
                                            <span>{{ $relatedNews->created_at->format('d/m/Y H:i') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    There Is No Related News
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="newsContainer" class="row mb-5 mt-3">
                <div class="col-12">
                    <div class="row mt-3" data-aos="fade-up">
                        <h3>Latest News</h3>
                    </div>
                    <div class="row mb-4">
                        <div class="news_list">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($newses as $newsItem)
                            <div class="news_item" data-aos="zoom-in" data-aos-delay="{{ $incrementCategory+= 150 }}">
                                <div class="news_image_container">
                                    <a href="{{ route('news-detail',$newsItem->slug) }}">
                                        <img src="{{ asset("storage/" . $newsItem->photo) }}" alt="">
                                    </a>
                                </div>
                                <div class="text_container">
                                    <a href="{{ route('news-detail',$newsItem->slug) }}">{!! str_limit($newsItem->title,
                                        $limit = 61) !!}</a>
                                    <div class="timestamp">
                                        <a href="" class="news_category">{{ $newsItem->newsCategory->title }}</a>
                                        <span>{{ $newsItem->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-12">
                                    There Is No Other News
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection