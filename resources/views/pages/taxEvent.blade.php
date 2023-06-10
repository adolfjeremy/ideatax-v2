@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
    <link rel="stylesheet" href="/assets/css/pages/newsDetail1.css">
@endsection

@section('title')
    {{ $taxEvent->title }} | Ideatax
@endsection

    
@section('content')
    <section id="categoriesList">
        <div class="container">
            <div class="row">
                <ul>
                    @foreach ($articleCategories as $articleCategory)
                        <li>
                            <a href="{{ route('article-category', $articleCategory->slug) }}">{{ $articleCategory->title }}</a>
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
                    <div class="row news_title mt-3">
                        <h1>{{ $taxEvent->title }}</h1>
                    </div>
                    <div class="row">
                        <p>{{ $taxEvent->created_at->format('d M, Y H:i') }} WIB</p>
                    </div>
                    <div class="row mt-2">
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
                                        <h3>{!! str_limit($taxEventItem->title, $limit = 50) !!}</h3>
                                        <span>{{ $taxEventItem->created_at->format('d M, Y') }}</span>
                                    </a>
                                @empty
                                    <div class="tax_event_item text-center text-light">
                                        No other event at the moment
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
                            <h2>Latest Articles</h2>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="news_list">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($articles as $article)
                                <div class="news_item" data-aos="zoom-in" data-aos-delay="{{ $incrementCategory+= 150 }}">
                                    <div class="news_image_container">
                                        <a href="{{ route('article-detail',$article->slug) }}"><img src="{{ asset("storage/" . $article->photo) }}" alt="{{ $article->title }}"></a>
                                    </div>
                                    <div class="text_container">
                                        <a href="{{ route('article-detail',$article->slug) }}">{!! str_limit($article->title, $limit = 61) !!}</a>
                                        <div class="timestamp">
                                            <a href="{{ route('article-category',$article->articleCategory->slug) }}" class="news_category">{{ $article->articleCategory->title }}</a>
                                            <span>{{ $article->created_at->format('d M, Y H:i') }} WIB</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    There Is No Article
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection