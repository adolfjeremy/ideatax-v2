@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/articles">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
@endsection

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $page->description_eng }}">
        <meta property="og:description" content="{{ $page->description_eng }}">
        <meta property="og:title" content="{{ $page->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $page->description }}">
        <meta property="og:description" content="{{ $page->description }}">
        <meta property="og:title" content="{{ $page->SEO_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/articles">
    <meta property="og:type" content="article">
@endsection

@section('title')
    @if (app()->getLocale() == "en")
        {{ $page->SEO_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $page->SEO_title }}
    @endif
@endsection

    
@section('content')
    <section id="categoriesList">
        <div class="container">
            <div class="row">
                <ul>
                    @foreach ($articleCategories as $articleCategory)
                        <li>
                            <a href="{{ app()->getLocale() ? route('article-category', $articleCategory->slug) : route('article-category.id', $articleCategory->slug) }}">{{ $articleCategory->title }}</a>
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
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ($articleCarousels as $articleCarousel)
                                <div class="carousel-item @if ($loop->first)active @endif">
                                    <a href="{{ app()->getLocale() == "en" ? route('article-detail',$articleCarousel->slug_eng) : route('article-detail.id',$articleCarousel->slug) }}"><img src="{{ asset("storage/" . $articleCarousel->photo) }}" class="d-block w-100" alt="{{ app()->getLocale() == "en" ? $articleCarousel->title_eng : $articleCarousel->title }}"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>
                                            <a href="{{ app()->getLocale() == "en" ? route('article-detail',$articleCarousel->slug_eng) : route('article-detail.id',$articleCarousel->slug) }}">
                                                @if (app()->getLocale() == "en")
                                                    {{ $articleCarousel->title_eng }}
                                                @endif
                                                @if (app()->getLocale() == "id")
                                                    {{ $articleCarousel->title }}
                                                @endif
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <img src="/assets/images/no-data.jpg" class="d-block w-100" alt="ideatax updates">
                                    <div class="carousel-caption d-block">
                                        <h5>There Is No Article</h5>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div id="taxEvent" class="col-12 col-lg-4 tax_event_container">
                    <div class="row py-1">
                        <h2>Tax Event</h2>
                    </div>
                    <div class="row">
                        <div class="tax_event_list">
                            @forelse ($taxEvents as $taxEvent)
                                <a href="{{ app()->getLocale() == "en" ? route('tax-event', $taxEvent->slug_eng) : route('tax-event.id', $taxEvent->slug) }}" class="tax_event_item">
                                    <h3>
                                        @if (app()->getLocale() == "en")
                                            {!! str_limit($taxEvent->title_eng, $limit = 50) !!}
                                        @endif
                                        @if (app()->getLocale() == "id")
                                            {!! str_limit($taxEvent->title, $limit = 50) !!}
                                        @endif
                                    </h2>
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
            </div>
        </div>
    </section>
    <section id="newsContainer" class="pt-2 mt-3 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="header_container text-start mb-2">
                            <h1>Latest Articles</h1>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="news_list">
                            @forelse ($articles as $article)
                                <div class="news_item">
                                    <div class="news_image_container">
                                        <a href="{{ app()->getLocale() == "en" ? route('article-detail',$article->slug_eng) : route('article-detail.id',$article->slug) }}"><img src="{{ asset("storage/" . $article->photo) }}" alt="{{ app()->getLocale() == "en" ? $article->title_eng : $article->title }}"></a>
                                    </div>
                                    <div class="text_container">
                                        <h3>
                                            <a href="{{ app()->getLocale() == "en" ? route('article-detail',$article->slug_eng) : route('article-detail.id',$article->slug) }}">
                                                @if (app()->getLocale() == "en")
                                                    {!! str_limit($article->title_eng, $limit = 61) !!}
                                                @endif
                                                @if (app()->getLocale() == "id")
                                                    {!! str_limit($article->title, $limit = 61) !!}
                                                @endif
                                            </a>
                                        </h3>
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
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection