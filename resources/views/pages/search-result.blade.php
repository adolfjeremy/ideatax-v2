@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/articles">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
@endsection

@section('content')
    <section class="search_header py-5">
        <div class="overlay"></div>
        <div class="container">
            <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <h1>
                    @if (app()->getLocale() == "en")
                    Search Result
                    @else
                    Hasil Pencarian
                    @endif
                </h1>
            </div>
        </div>
    </section>
    @if (count($articles) > 0)
    <section id="newsContainer" class="pt-2 mt-3 pb-5">
        <div class="container">
            <div class="row">
                <h2>Articles</h2>
            </div>
            <div class="row">
                <div class="news_list">
                    @foreach ($articles as $article)
                        <x-news-item :title="$article->title" :title-eng="$article->title_eng" :route="route('article-detail.id',$article->slug)"
                            :route-eng="route('article-detail',$article->slug_eng)"
                            :category-eng-route="route('article-category',$article->articleCategory->slug)"
                            :category-route="route('article-category.id',$article->articleCategory->slug)"
                            :category="$article->articleCategory->title"
                            :timestamp="$article->created_at"
                            :image="$article->photo" />
                    @endforeach
                </div>
                {{ $articles->links() }}
            </div>
        </div>
    </section>
    @endif
    @if (count($taxUpdates) > 0)
    <section id="newsContainer" class="pt-2 mt-3 pb-5">
        <div class="container">
            <div class="row mb-2">
                <h2>Tax Updates</h2>
            </div>
            <div class="row">
                <div class="news_list">
                    @foreach ($taxUpdates as $taxUpdate)
                        <div class="news_item">
                            <div class="news_image_container">
                                <a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdate->slug_eng) : route('tax-update-detail.id',$taxUpdate->slug) }}"><img src="{{ asset("storage/" . $taxUpdate->photo) }}" alt="{{ $taxUpdate->title }}"></a>
                            </div>
                            <div class="text_container">
                                <h2>
                                    <a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdate->slug_eng) : route('tax-update-detail.id',$taxUpdate->slug) }}">
                                        @if (app()->getLocale() == "en")
                                            {!! str_limit($taxUpdate->title_eng, $limit = 60) !!}
                                        @endif
                                        @if (app()->getLocale() == "id")
                                            {!! str_limit($taxUpdate->title, $limit = 60) !!}
                                        @endif
                                    </a>
                                </h2>
                                <div class="timestamp">
                                    <a href="{{ app()->getLocale() == "en" ? route('tax-update-category',$taxUpdate->taxUpdateCategory->slug) : route('tax-update-category.id',$taxUpdate->taxUpdateCategory->slug) }}" class="news_category">{{ $taxUpdate->taxUpdateCategory->title }}</a>
                                    <span>{{ $taxUpdate->created_at->format('d M, Y H:i') }} WIB</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    @if (count($articles) == 0 && count($taxUpdates) ==0)
        <section class="py-5">
            <div class="container">
                <p>{{ $search }} 
                    @if (app()->getLocale() == "en")
                    not found. Please try another search.
                    @else
                    tidak dapat ditemukan. Coba kata kunci lain
                    @endif
                </p>
            </div>
        </section>
    @endif
@endsection