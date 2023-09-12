@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
    <link rel="stylesheet" href="/assets/css/pages/newsDetail1.css">
@endsection

@section('meta')
    @if(session()->get('applocale') == "en")
        <meta name="description" content="{{ $customerQuestion->description_eng }}">
        <meta property="og:description" content="{{ $customerQuestion->description_eng }}">
        <meta property="og:title" content="{{ $customerQuestion->SEO_title_eng }}">
    @endif
        
    @if(session()->get('applocale') == "id")
        <meta name="description" content="{{ $customerQuestion->description }}">
        <meta property="og:description" content="{{ $customerQuestion->description }}">
        <meta property="og:title" content="{{ $customerQuestion->seo_title }}">
    @endif
    <meta property="og:url" content="https://ideatax.id/articles">
    <meta property="og:type" content="article">
@endsection

@section('title')
    @if (session()->get('applocale') == "en")
        {{ $customerQuestion->seo_title_eng }}
    @endif
    @if (session()->get('applocale') == "id")
        {{ $customerQuestion->seo_title }}
    @endif
@endsection

    
@section('content')
    <section id="categoriesList">
        <div class="container">
            <div class="row">
                <ul>
                    @foreach ($taxUpdateCategories as $taxUpdateCategory)
                        <li>
                            <a href="{{ route('tax-update-category', $taxUpdateCategory->slug) }}">{{ $taxUpdateCategory->title }}</a>
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
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ route("update") }}">Tax Update</a></li>
                        <li class="breadcrumb-item breadcrumb-cst">Tax Consulting</li>
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ route('tax-update-category',$customerQuestion->taxUpdateCategory->slug) }}">{{ $customerQuestion->taxUpdateCategory->title }}</a></li>
                        <li class="breadcrumb-item breadcrumb-cst active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <img src="{{ asset("storage/" . $customerQuestion->photo) }}" alt="{{ $customerQuestion->title }}" class="w-100">
                    </div>
                    <div class="row mt-2 news_title">
                        <h1>{{ $customerQuestion->title }}</h1>
                        <span class="timestamp">{{ $customerQuestion->created_at->format('d M, Y H:i') }} WIB</span>
                    </div>
                    <div class="row mt-2 news_body">
                        @if (session()->get('applocale') == "en")
                            <h5>Question by {{ $customerQuestion->name }} :</h5>
                            <p>{!! $customerQuestion->question_eng !!}</p>
                        @endif
                        @if (session()->get('applocale') == "id")
                            <h5>Pertanyaan oleh {{ $customerQuestion->name }} :</h5>
                            <p>{!! $customerQuestion->question !!}</p>
                        @endif                        
                    </div>
                    <div class="row mt-1">
                         @if (session()->get('applocale') == "en")
                            <h5>Answer:</h5>
                            <div class="news_body">{!! $customerQuestion->answer_eng !!}</div>
                        @endif
                        @if (session()->get('applocale') == "id")
                            <h5>Jawaban:</h5>
                            <div class="news_body">{!! $customerQuestion->answer_eng !!}</div>
                        @endif    
                    </div>
                </div>
                <div id="sideNews" class="col-12 col-lg-4">
                    <div class="row inquiry-form">
                         <div id="customerQuestions" class="col-12">
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
                                        <a href="{{ route('tax-update-detail',$taxUpdate->slug) }}">
                                            <img src="{{ asset("storage/" . $taxUpdate->photo) }}" alt="{{ $taxUpdate->title }}">
                                        </a>
                                    </div>
                                    <div class="text_container">
                                        <h3>
                                            <a title="@if (session()->get('applocale') == "en")
                                                    {{ $taxUpdate->title_eng }}
                                                @endif
                                                @if (session()->get('applocale') == "id")
                                                    {{ $taxUpdate->title }}
                                                @endif" href="{{ route('tax-update-detail',$taxUpdate->slug) }}">
                                                @if (session()->get('applocale') == "en")
                                                    {!! str_limit($taxUpdate->title_eng,$limit = 61) !!}
                                                @endif
                                                @if (session()->get('applocale') == "id")
                                                    {!! str_limit($taxUpdate->title,$limit = 61) !!}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="timestamp">
                                            <a href="{{  route('tax-update-category',$taxUpdate->taxUpdateCategory->slug)  }}" class="news_category">{{ $taxUpdate->taxUpdateCategory->title }}</a>
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
            <div id="newsContainer" class="row mb-4 mt-3">
                <div class="col-12">
                    <div class="row">
                        <div class="header_container text-start mb-2">
                            <h3>Tax Consulting</h3>
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
                                            @if (session()->get('applocale') == "en")
                                            <a href="{{ route('tax-consulting', $customerQuestion->slug) }}">{!! str_limit($customerQuestion->title_eng,$limit = 61) !!}</a>
                                            @endif
                                            @if (session()->get('applocale') == "id")
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