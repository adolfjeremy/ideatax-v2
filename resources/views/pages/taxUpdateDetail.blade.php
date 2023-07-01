@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/news1.css">
    <link rel="stylesheet" href="/assets/css/pages/newsDetail1.css">
@endsection

@section('title')
    {{ $taxUpdate->title }} | Ideatax
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
                        <li class="breadcrumb-item breadcrumb-cst"><a href="{{ route('tax-update-category',$taxUpdate->taxUpdateCategory->slug) }}">{{ $taxUpdate->taxUpdateCategory->title }}</a></li>
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
                        <h1>{{ $taxUpdate->title }}</h1>
                    </div>
                    <div class="row mb-2 d-flex flex-row">
                        <div class="col-12">
                            <a href="{{ route('tax-update-category',$taxUpdate->taxUpdateCategory->slug) }}" class="text-warning fs-6 fw-bolder">{{ $taxUpdate->taxUpdateCategory->title }}</a>
                            <span class="text-dark fw-normal timestamp">- {{ $taxUpdate->created_at->format('d M, Y H:i') }} WIB</span>
                        </div>
                        <div class="col-12">
                            @if ($taxUpdate->user)
                            <p class="author">Written by: {{ $taxUpdate->user->name }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="news_body">{!! $taxUpdate->body !!}</div>
                        @if ($taxUpdate->pdf)
                            <div class="mt-2">
                                <a href="{{ asset("storage/" . $taxUpdate->pdf) }}" target="_blank" class="btn btn-md btn-warning rounded">Download</a>
                            </div>
                        @else
                            
                        @endif
                    </div>
                </div>
                <div id="sideNews" class="col-12 col-lg-4">
                    <div class="row">
                        <div id="customerQuestions" class="col-12">
                            <div class="row text-center header">
                                <h2 class="py-3">Inquiry Form</h2>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <form action="{{ route('update-save') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12 my-3">
                                        <input type="text" id="name" name="name" class="form-control w-100" placeholder="Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" id="email" name="email" class="form-control w-100" placeholder="Email" required>
                                    </div>
                                    <input type="hidden" id="status" name="status" class="form-control w-100" value="UNANSWERED" required>
                                    <div class="col-12 mb-3 d-flex flex-column">
                                        <textarea name="question" id="editor" class="form-control w-100" placeholder="Question" required></textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <button type="submit" class="btn btn-warning d-block w-100">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="newsContainer" class="row mt-4 mb-1 related">
                        <div class="col-12">
                            <div class="row">
                                <h2>Related Updates</h2>
                            </div>
                            <div class="row mt-3">
                                <div class="news_detail_list">
                                    @php $incrementCategory = 0 @endphp
                                    @forelse ($relatedUpdates as $relatedUpdate)
                                    <div class="news_detail_item">
                                        <div class="news_image_container">
                                            <a href="{{ route('tax-update-detail',$relatedUpdate->slug) }}">
                                                <img src="{{ asset("storage/" . $relatedUpdate->photo) }}" alt="{{ $relatedUpdate->title }}">
                                            </a>
                                        </div>
                                        <div class="text_container">
                                            <h3><a title="{{ $relatedUpdate->title }}" href="{{ route('tax-update-detail',$relatedUpdate->slug) }}">{!! str_limit($relatedUpdate->title,
                                                $limit = 61) !!}</a></h3>
                                            <div class="timestamp">
                                                <a href="{{ route('tax-update-category',$relatedUpdate->taxUpdateCategory->slug) }}" class="news_category">{{ $relatedUpdate->taxUpdateCategory->title }}</a>
                                                <span>{{ $relatedUpdate->created_at->format('d M, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <div class="col-12">
                                            There Is No Related Updates
                                        </div>
                                    @endforelse
                                </div>
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
                                        <h3><a title="{{ $taxUpdate->title }}" href="{{ route('tax-update-detail',$taxUpdate->slug) }}">{!! str_limit($taxUpdate->title,
                                            $limit = 61) !!}</a></h3>
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
                            <h2>Tax Consulting</h2>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="discussion_list">
                            @php $incrementCategory = 0 @endphp
                            @foreach ($customerQuestions as $customerQuestion)
                                <div class="discussion_item">
                                    <div class="image-container w-100">
                                        <a href="{{ route('tax-consulting', $customerQuestion->slug) }}"><img src="{{ asset("storage/" . $customerQuestion->photo) }}" alt="{{ $customerQuestion->title }}" class="w-100"></a>
                                    </div>
                                    <div class="caption_container px-2">
                                        <h3>
                                            <a href="{{ route('tax-consulting', $customerQuestion->slug) }}">{{ $customerQuestion->title }}</a>
                                        </h3>
                                        <div class="timestamp">
                                            <a href="{{ route('tax-update-category',$customerQuestion->taxUpdateCategory->slug) }}" class="text-warning">{{ $customerQuestion->taxUpdateCategory->title }}</a>
                                            <span>{{ $customerQuestion->created_at->format('d M, Y H:i') }} WIB</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $customerQuestions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection