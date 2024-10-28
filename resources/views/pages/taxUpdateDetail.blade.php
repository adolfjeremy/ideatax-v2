@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="https://ideatax.id/articles/{{ $taxUpdate->slug }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
    <link rel="stylesheet" href="/assets/css/pages/newsDetail1.css">
@endsection

@section('meta')
    @if(app()->getLocale() == "en")
        <meta name="description" content="{{ $taxUpdate->description_eng }}">
        <meta property="og:description" content="{{ $taxUpdate->description_eng }}">
        <meta property="og:title" content="{{ $taxUpdate->SEO_title_eng }}">
    @endif
        
    @if(app()->getLocale() == "id")
        <meta name="description" content="{{ $taxUpdate->description }}">
        <meta property="og:description" content="{{ $taxUpdate->description }}">
        <meta property="og:title" content="{{ $taxUpdate->SEO_title }}">
    @endif
    
    <meta property="og:url" content="https://ideatax.id/tax-update/{{ $taxUpdate->slug }}">
    <meta property="og:type" content="article">
@endsection

@section('title')
    @if (app()->getLocale() == "en")
        {{ $taxUpdate->SEO_title_eng }}
    @endif
    @if (app()->getLocale() == "id")
        {{ $taxUpdate->SEO_title }}
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
    <section id="newsDetail" class="mt-4">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ app()->getLocale() == "en" ? route("update") : route("update.id")  }}">Tax Update</a></li>
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ app()->getLocale() == "en" ? route('tax-update-category',$taxUpdate->taxUpdateCategory->slug) : route('tax-update-category.id',$taxUpdate->taxUpdateCategory->slug) }}">{{ $taxUpdate->taxUpdateCategory->title }}</a></li>
                        <li class="breadcrumb-item breadcrumb-cst active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <img src="{{ asset("storage/" . $taxUpdate->photo) }}" alt="{{ $taxUpdate->title }}" class="w-100">
                    </div>
                    <div class="row mt-2 news_title">
                        <h1>
                            @if (app()->getLocale() == "en")
                                {{ $taxUpdate->title_eng }}
                            @endif
                            @if (app()->getLocale() == "id")
                                {{ $taxUpdate->title }}
                            @endif
                        </h1>
                    </div>
                    <div class="row mb-2 d-flex flex-row">
                        <div class="col-12">
                            <a href="{{ app()->getLocale() == "en" ? route('tax-update-category',$taxUpdate->taxUpdateCategory->slug) : route('tax-update-category.id',$taxUpdate->taxUpdateCategory->slug) }}" class="text-warning fs-6 fw-bolder">{{ $taxUpdate->taxUpdateCategory->title }}</a>
                            <span class="text-dark fw-normal timestamp">- {{ $taxUpdate->created_at->format('d M, Y H:i') }} WIB</span>
                        </div>
                        <div class="col-12">
                            @if ($taxUpdate->user)
                            <p class="author">
                                {{ __('home.written') }} {{ $taxUpdate->user->name }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="news_body">
                            @if (app()->getLocale() == "en")
                                {!! $taxUpdate->body_eng !!}
                            @endif
                            @if (app()->getLocale() == "id")
                                {!! $taxUpdate->body !!}
                            @endif
                        </div>
                        @if ($taxUpdate->pdf)
                            <div class="mt-2">
                                <a href="{{ asset("storage/" . $taxUpdate->pdf) }}" target="_blank" class="btn btn-md btn-warning rounded">Download</a>
                            </div>
                        @else
                            
                        @endif
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
            <div id="newsContainer" class="row">
                <div class="col-12">
                    <div class="row mt-5">
                        <h2>Latest Updates</h2>
                    </div>
                    <div class="row mb-4">
                        <div class="news_list">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($taxUpdates as $taxUpdate)
                                <div class="news_item">
                                    <div class="news_image_container">
                                        <a href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdate->slug_eng) : route('tax-update-detail.id',$taxUpdate->slug) }}">
                                            <img src="{{ asset("storage/" . $taxUpdate->photo) }}" alt="{{ $taxUpdate->title }}">
                                        </a>
                                    </div>
                                    <div class="text_container">
                                        <h3>
                                            <a title="@if (app()->getLocale() == "en")
                                                    {{ $taxUpdate->title_eng }}
                                                @endif
                                                @if (app()->getLocale() == "id")
                                                    {{ $taxUpdate->title }}
                                                @endif" href="{{ app()->getLocale() == "en" ? route('tax-update-detail',$taxUpdate->slug_eng) : route('tax-update-detail.id',$taxUpdate->slug) }}">
                                                @if (app()->getLocale() == "en")
                                                    {!! str_limit($taxUpdate->title_eng,$limit = 61) !!}
                                                @endif
                                                @if (app()->getLocale() == "id")
                                                    {!! str_limit($taxUpdate->title,$limit = 61) !!}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="timestamp">
                                            <a href="{{ app()->getLocale() == "en" ? route('tax-update-category',$taxUpdate->taxUpdateCategory->slug) : route('tax-update-category.id',$taxUpdate->taxUpdateCategory->slug)  }}" class="news_category">{{ $taxUpdate->taxUpdateCategory->title }}</a>
                                            <span>{{ $taxUpdate->created_at->format('d M, Y H:i') }} WIB</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    There Is No Other Updates
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!--<div id="newsContainer" class="row mb-4 mt-3">-->
            <!--    <div class="col-12">-->
            <!--        <div class="row">-->
            <!--            <div class="header_container text-start mb-2">-->
            <!--                <h2>Tax Consulting</h2>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="row mb-2">-->
            <!--            <div class="discussion_list">-->
            <!--                @forelse ($customerQuestions as $customerQuestion)-->
            <!--                    <div class="discussion_item">-->
            <!--                        <div class="image-container w-100">-->
            <!--                            <a href="{{ route('tax-consulting', $customerQuestion->slug) }}"><img src="{{ asset("storage/" . $customerQuestion->photo) }}" alt="" class="w-100"></a>-->
            <!--                        </div>-->
            <!--                        <div class="caption_container px-2">-->
            <!--                            <h3>-->
            <!--                                @if (app()->getLocale() == "en")-->
            <!--                                <a href="{{ route('tax-consulting', $customerQuestion->slug) }}">{!! str_limit($customerQuestion->title_eng,$limit = 61) !!}</a>-->
            <!--                                @endif-->
            <!--                                @if (app()->getLocale() == "id")-->
            <!--                                <a href="{{ route('tax-consulting', $customerQuestion->slug) }}">{!! str_limit($customerQuestion->title,$limit = 61) !!}</a>-->
            <!--                                @endif-->
            <!--                            </h3>-->
            <!--                            <div class="timestamp">-->
            <!--                                <a href="{{ route('tax-update-category',$customerQuestion->taxUpdateCategory->slug) }}" class="text-warning">{{ $customerQuestion->taxUpdateCategory->title }}</a>-->
            <!--                                <span class="ms-1">{{ $customerQuestion->created_at->format('d M, Y H:i') }} WIB</span>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                @empty-->
            <!--                    <div class="col-12">-->
            <!--                        There is No Other Data -->
            <!--                    </div>-->
            <!--                @endforelse-->
            <!--            </div>-->
            <!--            {{ $customerQuestions->links() }}-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </section>
@endsection