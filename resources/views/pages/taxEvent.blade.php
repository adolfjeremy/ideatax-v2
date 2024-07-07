@extends('layouts.app')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
    <link rel="stylesheet" href="/assets/css/pages/newsDetail1.css">
@endsection

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/articles/event/{{ $taxEvent->slug }}">
@endsection

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $taxEvent->description_eng }}">
        <meta property="og:description" content="{{ $taxEvent->description_eng }}">
        <meta property="og:title" content="{{ $taxEvent->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $taxEvent->description }}">
        <meta property="og:description" content="{{ $taxEvent->description }}">
        <meta property="og:title" content="{{ $taxEvent->SEO_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/articles/event/{{ $taxEvent->slug }}">
    <meta property="og:type" content="article">
@endsection


@section('title')
    @if (app()->getLocale() == "en")
        {{ $taxEvent->SEO_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $taxEvent->SEO_title }}
    @endif
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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ app()->getLocale() == "en" ? route("articles") : route("articles.id") }}">Articles</a></li>
                        <li class="breadcrumb-item breadcrumb-cst active" aria-current="page">Tax Event</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <img src="{{ asset("storage/" . $taxEvent->photo) }}" alt="{{ app()->getLocale() == "en" ? $taxEvent->title_eng : $taxEvent->title }}" class="w-100">
                    </div>
                    <div class="row news_title mt-3">
                        <h1>
                            @if (app()->getLocale() == "en")
                                {{ $taxEvent->title_eng }}
                            @endif
                            @if (app()->getLocale() == "id")
                                {{ $taxEvent->title }}
                            @endif
                        </h1>
                    </div>
                    <div class="row">
                        <p>{{ $taxEvent->created_at->format('d M, Y H:i') }} WIB</p>
                    </div>
                    <div class="row mt-2">
                        @if (app()->getLocale() == "en")
                            <div>{!! $taxEvent->body_eng !!}</div>
                        @endif
                        @if (app()->getLocale() == "id")
                            <div>{!! $taxEvent->body !!}</div>
                        @endif
                        
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
                                    <a href="{{ app()->getLocale() == "en" ? route('tax-event', $taxEventItem->slug_eng) : route('tax-event.id', $taxEventItem->slug) }}" class="tax_event_item">
                                        <h3>
                                            @if (app()->getLocale() == "en")
                                                {!! str_limit($taxEventItem->title_eng, $limit = 50) !!}
                                            @endif
                                            @if (app()->getLocale() == "id")
                                                {!! str_limit($taxEventItem->title, $limit = 50) !!}
                                            @endif
                                            
                                        </h3>
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
                        <div class="header_container text-start mb-2">
                            <h2>Latest Articles</h2>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="news_list">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($articles as $article)
                                <div class="news_item">
                                    <div class="news_image_container">
                                        <a href="{{ app()->getLocale() == "en" ? route('article-detail',$article->slug_eng) : route('article-detail.id',$article->slug) }}"><img src="{{ asset("storage/" . $article->photo) }}" alt="{{ app()->getLocale() == "en" ? $article->title_eng : $article->title }}"></a>
                                    </div>
                                    <div class="text_container">
                                        <a href="{{ app()->getLocale() == "en" ? route('article-detail',$article->slug_eng) : route('article-detail.id',$article->slug) }}">
                                            @if (app()->getLocale() == "en")
                                                {!! str_limit($article->title_eng, $limit = 61) !!}
                                            @endif
                                            @if (app()->getLocale() == "id")
                                                {!! str_limit($article->title, $limit = 61) !!}
                                            @endif
                                        </a>
                                        <div class="timestamp">
                                            <a href="{{ app()->getLocale() == "en" ? route('article-category',$article->articleCategory->slug) : route('article-category.id',$article->articleCategory->slug) }}" class="news_category">{{ $article->articleCategory->title }}</a>
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