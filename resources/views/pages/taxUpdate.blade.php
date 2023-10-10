@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/tax-update">
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
    <meta property="og:url" content="https://ideatax.id/tax-update">
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
                <div class="col-12 col-lg-8">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ( $taxUpdateCarousels as  $taxUpdateCarousel)
                                <div class="carousel-item @if ($loop->first)active @endif">
                                    <a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdateCarousel->slug_eng) : route('tax-update-detail.id',$taxUpdateCarousel->slug) }}"><img src="{{ asset("storage/" . $taxUpdateCarousel->photo) }}" class="d-block w-100" alt="{{ $taxUpdateCarousel->title }}"></a>
                                    <div class="carousel-caption d-block">
                                        <h5>
                                            <a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdateCarousel->slug_eng) : route('tax-update-detail.id',$taxUpdateCarousel->slug) }}">
                                                @if (app()->getLocale() == "en")
                                                    {{ $taxUpdateCarousel->title_eng }}
                                                @endif
                                                @if (app()->getLocale() == "id")
                                                    {{ $taxUpdateCarousel->title }}
                                                @endif
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
                <div id="customerQuestions" class="col-12 col-lg-4 mt-4 my-lg-0">
                    <div class="row text-center header">
                        <h2 class="py-3">{{ __('home.question') }}</h2>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <form action="{{ route('update-save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 my-3">
                                <input type="text" id="name" name="name" class="form-control w-100" placeholder="{{ __('home.name') }}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="email" id="email" name="email" class="form-control w-100" placeholder="Email" required>
                            </div>
                            <input type="hidden" id="status" name="status" class="form-control w-100" value="UNANSWERED" required>
                            <div class="col-12 mb-3 d-flex flex-column">
                                <textarea name="question" id="editor" class="form-control w-100" placeholder="{{ __('home.ask') }}" required></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-warning d-block w-100">{{ __('home.askButton') }}</button>
                            </div>
                        </form>
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