@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/tax-update">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
@endsection

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $taxUpdateCategory->description_eng }}">
        <meta property="og:description" content="{{ $taxUpdateCategory->description_eng }}">
        <meta property="og:title" content="{{ $taxUpdateCategory->seo_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $taxUpdateCategory->description }}">
        <meta property="og:description" content="{{ $taxUpdateCategory->description }}">
        <meta property="og:title" content="{{ $taxUpdateCategory->seo_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/articles">
    <meta property="og:type" content="article">
@endsection

@section('title')
    @if (app()->getLocale() == "en")
        {{ $taxUpdateCategory->seo_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $taxUpdateCategory->seo_title }}
    @endif
@endsection

    
@section('content')
    <section id="categoriesList">
        <div class="container">
            <div class="row">
                <ul>
                    @foreach ($taxUpdateCategories as $taxUpdateCategory)
                        <li>
                            <a href="{{ app()->getLocale() == "en" ? route('tax-update-category', $taxUpdateCategory->slug) : route('tax-update-category.id', $taxUpdateCategory->slug) }}">{{ $taxUpdateCategory->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <section id="newsCarousel" class="mt-3">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ app()->getLocale() == "en" ? route("update") : route("update.id") }}">Tax Update</a></li>
                        <li class="breadcrumb-item breadcrumb-cst active">{{ $currentCategory }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ( $taxUpdateCarousels as  $taxUpdateCarousel)
                                <div class="carousel-item @if ($loop->first)active @endif">
                                    <a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdateCarousel->slug_eng) : route('tax-update-detail.id',$taxUpdateCarousel->slug) }}"><img src="{{ asset("storage/" . $taxUpdateCarousel->photo) }}" class="d-block w-100" alt="{{ app()->getLocale() == "en" ? $taxUpdateCarousel->title_eng : $taxUpdateCarousel->title }}"></a>
                                    <div class="carousel-caption d-block">
                                        <h5>
                                            <a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdateCarousel->slug_eng) : route('tax-update-detail.id',$taxUpdateCarousel->slug) }}">
                                                {{app()->getLocale() == "en" ? $taxUpdateCarousel->title_eng : $taxUpdateCarousel->title }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <img src="/assets/images/no-data.jpg" class="d-block w-100" alt="ideatax updates">
                                    <div class="carousel-caption d-block">
                                        <h5>There Is No Update</h5>
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
    <section id="newsContainer" class="pt-2 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="header_container text-start mb-2">
                            <h1>Latest Update</h1>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="news_list">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($taxUpdates as $taxUpdate)
                                <div class="news_item">
                                    <div class="news_image_container">
                                        <a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdate->slug_eng) : route('tax-update-detail.id',$taxUpdate->slug) }}"><img src="{{ asset("storage/" . $taxUpdate->photo) }}" alt="{{ app()->getLocale() == "en" ? $taxUpdate->title_eng : $taxUpdate->title }}"></a>
                                    </div>
                                    <div class="text_container">
                                        <h2><a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdate->slug_eng) : route('tax-update-detail.id',$taxUpdate->slug) }}">{!! app()->getLocale() == "en" ? str_limit($taxUpdate->title_eng, $limit = 60) : str_limit($taxUpdate->title, $limit = 60) !!}</a></h2>
                                        <div class="timestamp">
                                            <a href="{{ app()->getLocale() == "en" ? route('tax-update-category',$taxUpdate->taxUpdateCategory->slug) : route('tax-update-category.id',$taxUpdate->taxUpdateCategory->slug) }}" class="news_category">{{ $taxUpdate->taxUpdateCategory->title }}</a>
                                            <span>{{ $taxUpdate->created_at->format('d M, Y H:i') }} WIB</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    There Is No Updates
                                </div>
                            @endforelse
                        </div>
                        {{ $taxUpdates->links() }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="header_container text-start mb-2">
                            <h2>Tax Consulting</h2>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="discussion_list">
                            @forelse ($customerQuestions as $customerQuestion)
                                <div class="discussion_item">
                                    <div class="image-container w-100">
                                        <a href="{{ route('tax-consulting', $customerQuestion->slug) }}"><img src="{{ asset("storage/" . $customerQuestion->photo) }}" alt="" class="w-100"></a>
                                    </div>
                                    <div class="caption_container px-2">
                                        <h3>
                                            @if (app()->getLocale() == "en")
                                            <a href="{{ route('tax-consulting', $customerQuestion->slug) }}">{!! str_limit($customerQuestion->title_eng,$limit = 61) !!}</a>
                                            @endif
                                            @if (app()->getLocale() == "id")
                                            <a href="{{ route('tax-consulting', $customerQuestion->slug) }}">{!! str_limit($customerQuestion->title,$limit = 61) !!}</a>
                                            @endif
                                        </h3>
                                        <div class="timestamp">
                                            <a href="{{ route('tax-update-category',$customerQuestion->taxUpdateCategory->slug) }}" class="text-warning">{{ $customerQuestion->taxUpdateCategory->title }}</a>
                                            <span class="ms-1">{{ $customerQuestion->created_at->format('d M, Y H:i') }} WIB</span>
                                        </div>
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