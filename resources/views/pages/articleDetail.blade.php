@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/articles/{{ $article->slug }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
    <link rel="stylesheet" href="/assets/css/pages/newsDetail1.css">
@endsection

@section('meta')
    <meta name="description" content="{{ $article->description }}">
    <meta property="og:description" content="{{ $article->description }}">
    <meta property="og:title" content="{{ $article->SEO_title }}">
    <meta property="og:url" content="https://ideatax.id/articles/{{ $article->slug }}">
    <meta property="og:type" content="article">
@endsection


@section('title')
    {{ $article->title }}
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
    <section id="newsDetail" class="mt-4">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ route("articles") }}">Articles</a></li>
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ route('article-category',$article->articleCategory->slug) }}">{{ $article->articleCategory->title }}</a></li>
                        <li class="breadcrumb-item breadcrumb-cst active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <img src="{{ asset("storage/" . $article->photo) }}" alt="{{ $article->title }}" class="w-100">
                    </div>
                    <div class="row mt-2 news_title">
                        <h1>{{ $article->title }}</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('article-category',$article->articleCategory->slug) }}" class="text-warning fs-6 fw-bolder">{{ $article->articleCategory->title }}</a>
                            <span class="text-dark fw-normal timestamp">- {{ $article->created_at->format('d M, Y H:m') }} WIB</span>
                        </div>
                        <div class="col-12">
                            @if ($article->user)
                            <p class="author">Written by: {{ $article->user->name }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="news_body">{!! $article->body !!}</div>
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
                                    <h3>{!! str_limit($taxEvent->title, $limit = 50) !!}</h3>
                                    <span>{{ $taxEvent->created_at->format('d M, Y') }}</span>
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
                            <h2>Related Article</h2>
                        </div>
                        <div class="row mb-4">
                            <div class="news_detail_list">
                                @forelse ($relatedArticles as $relatedArticle)
                                <div class="news_detail_item">
                                    <div class="news_image_container">
                                        <a href="{{ route('article-detail',$relatedArticle->slug) }}">
                                            <img src="{{ asset("storage/" . $relatedArticle->photo) }}" alt="{{ $relatedArticle->title }}">
                                        </a>
                                    </div>
                                    <div class="text_container">
                                        <h3>
                                            <a href="{{ route('article-detail',$relatedArticle->slug) }}">{!! str_limit($relatedArticle->title,
                                            $limit = 61) !!}</a>
                                        </h3>
                                        <div class="timestamp">
                                            <a href="{{ route('article-category',$article->articleCategory->slug) }}" class="news_category">{{ $relatedArticle->articleCategory->title }}</a>
                                            <span>{{ $relatedArticle->created_at->format('d M, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    There Is No Related Article
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="newsContainer" class="row mb-5 mt-3">
                <div class="col-12">
                    <div class="row mt-3">
                        <h2>Latest Article</h2>
                    </div>
                    <div class="row mb-4">
                        <div class="news_list">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($articles as $articleItem)
                            <div class="news_item">
                                <div class="news_image_container">
                                    <a href="{{ route('article-detail',$articleItem->slug) }}">
                                        <img src="{{ asset("storage/" . $articleItem->photo) }}" alt="{{ $articleItem->title }}">
                                    </a>
                                </div>
                                <div class="text_container">
                                    <h3>
                                        <a href="{{ route('article-detail',$articleItem->slug) }}">{!! str_limit($articleItem->title,
                                        $limit = 61) !!}</a>
                                    </h3>
                                    <div class="timestamp">
                                        <a href="{{ route('article-category',$article->articleCategory->slug) }}" class="news_category">{{ $articleItem->articleCategory->title }}</a>
                                        <span>{{ $articleItem->created_at->format('d M, Y H:i') }} WIB</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-12">
                                    There Is No Other Article
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection