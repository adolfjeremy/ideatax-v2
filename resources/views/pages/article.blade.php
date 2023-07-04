@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/articles">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
@endsection

@section('meta')
    @if ($page->description)
        <meta name="description" content="{{ $page->description_eng }}">
        <meta property="og:description" content="{{ $page->description_eng }}">
    @else
        <meta name="description" content="We always aspire to provide the best service that is always focused on the best interests of the client. We also always prioritize the development of our talents so that they can continue to be relevant in existing changes to improve services to clients.">
        <meta property="og:description" content="We always aspire to provide the best service that is always focused on the best interests of the client. We also always prioritize the development of our talents so that they can continue to be relevant in existing changes to improve services to clients.">
    @endif
    
    <meta property="og:title" content="{{ $page->SEO_title_eng }}">
    <meta property="og:url" content="https://ideatax.id/articles">
    <meta property="og:type" content="article">
@endsection

@section('title')
    {{ $page->SEO_title_eng }}
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
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ($articleCarousels as $articleCarousel)
                                <div class="carousel-item @if ($loop->first)active @endif">
                                    <a href="{{ route('article-detail',$articleCarousel->slug) }}"><img src="{{ asset("storage/" . $articleCarousel->photo) }}" class="d-block w-100" alt="{{ $articleCarousel->title }}"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5><a href="{{ route('article-detail',$articleCarousel->slug) }}">{{ $articleCarousel->title }}</a></h5>
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
                                <a href="{{ route('tax-event', $taxEvent->slug) }}" class="tax_event_item">
                                    <h3>{!! str_limit($taxEvent->title, $limit = 50) !!}</h2>
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
                            @php $incrementCategory = 0 @endphp
                            @forelse ($articles as $article)
                                <div class="news_item">
                                    <div class="news_image_container">
                                        <a href="{{ route('article-detail',$article->slug) }}"><img src="{{ asset("storage/" . $article->photo) }}" alt="{{ $article->title }}"></a>
                                    </div>
                                    <div class="text_container">
                                        <h3>
                                            <a href="{{ route('article-detail',$article->slug) }}">{!! str_limit($article->title, $limit = 61) !!}</a>
                                        </h3>
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
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection