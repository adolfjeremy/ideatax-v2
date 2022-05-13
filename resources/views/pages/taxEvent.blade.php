@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news.css">
@endsection

@section('title')
    Ideatax | {{ $taxEvent->title }}
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
    <section id="newsCarousel">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <img src="{{ asset("storage/" . $taxEvent->photo) }}" alt="{{ $taxEvent->title }}" class="w-100">
                    </div>
                    <div class="row">
                        <h2>{{ $taxEvent->title }}</h2>
                    </div>
                    <div class="row">
                        <div>{!! $taxEvent->body !!}</div>
                    </div>
                </div>
                <div id="taxEvent" class="col-12 col-lg-4 tax_event_container">
                    <div class="col-12 event">
                        <div class="row py-1">
                            <h2>Tax Event</h2>
                        </div>
                        <div class="row">
                            <div class="tax_event_list">
                                @forelse ($taxEvents as $taxEventItem)
                                    <a href="{{ route('tax-event', $taxEvent->slug) }}" class="tax_event_item">
                                        <h4>{!! str_limit($taxEventItem->title, $limit = 50) !!}</h4>
                                        <span>{{ $taxEventItem->created_at->format('Y/m/d') }}</span>
                                    </a>
                                @empty
                                    <div class="tax_event_item text-center text-light">
                                        No event at the moment
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="newsContainer" class="pt-2 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="header_container text-start mb-2" data-aos="fade-up">
                            <h3>Latest News</h3>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="news_list">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($newses as $news)
                                <div class="news_item" data-aos="zoom-in" data-aos-delay="{{ $incrementCategory+= 150 }}">
                                    <div class="news_image_container">
                                        <a href="{{ route('news-detail',$news->slug) }}"><img src="{{ asset("storage/" . $news->photo) }}" alt="{{ $news->title }}"></a>
                                    </div>
                                    <div class="text_container">
                                        <a href="{{ route('news-detail',$news->slug) }}">{!! str_limit($news->title, $limit = 61) !!}</a>
                                        <div class="timestamp">
                                            <a href="{{ route('news-category',$news->newsCategory->slug) }}" class="news_category">{{ $news->newsCategory->title }}</a>
                                            <span>{{ $news->created_at->format('Y/m/d H:i') }} WIB</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    There Is No News
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection