@extends('layouts.app')

@section('canonical')
<link rel="canonical" href="https://ideatax.id/">
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
<meta property="og:url" content="https://ideatax.id">
<meta property="og:type" content="website">
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
@section('content')
<section class="hero">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>{{ __('HomePage.headingOne'); }} <br> {{ __('HomePage.headingTwo'); }}</h1>
                <a href="@if (app()->getLocale() == "en") {{ route("contact") }} @else {{ route("contact") }} @endif" class="btn btn-orange mt-3">
                    {{ __('HomePage.cta'); }}
                </a>
            </div>
        </div>
    </div>
</section>
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 about_desc">
                <div class="row">
                    <div class="col-12">
                        <p>
                            {{ __('HomePage.about'); }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2 about_stats d-flex">
                        <div class="d-flex flex-column align-items-center justify-content-start">
                            <p class="about_number project_num p-0 m-0">0</p>
                            <p class="about_head p-0 m-0">{{ __('HomePage.statOne'); }}</p>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-start">
                            <p class=" about_number client_num p-0 m-0">200+</p>
                            <p class="about_head p-0 m-0">{{ __('HomePage.statTwo'); }}</p>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-start">
                            <p class=" about_number exp_num p-0 m-0">20+</p>
                            <p class="about_head p-0 m-0">{{ __('HomePage.statThree'); }} <br>{{ __('HomePage.statFour'); }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mt-3 mt-md-0">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-7 col-md-12">
                        <img src="/assets/images/award.png" class="w-100" alt="award">
                    </div>
                </div>
                <div class="row mt-4 d-flex align-items-center justify-content-center">
                    <div class="col-7 col-md-12">
                        <button type="button" class="btn btn-orange w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Company Profile
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title text-start fw-normal fs-6" id="staticBackdropLabel">Silakan isi formulir di bawah ini sebelum mengunduh</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('home-save') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3 d-flex flex-column align-items-start">
                                                <label for="name" class="form-label fs-6">Name</label>
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                            <div class="mb-3 d-flex flex-column align-items-start">
                                                <label for="email" class="form-label fs-6">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                            </div>
                                            <div class="mb-3 d-flex flex-column align-items-start">
                                                <label for="tel" class="form-label fs-6">No. Telepon</label>
                                                <input type="tel" class="form-control" name="tel" id="tel" required>
                                            </div>
                                            <div class="mb-3 d-flex flex-column align-items-start">
                                                <label for="company" class="form-label fs-6">Perusahaan</label>
                                                <input type="text" class="form-control" name="company" id="company" required>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="expertise">
    <div class="container">
        <div class="row section_heading">
            <div class="col-12 text-center">
                <h2>{{ __('HomePage.headExpertise'); }}</h2>
            </div>
        </div>
        <div class="row expertise_item">
            <div class="col-12 col-md-6 mt-5">
                <img src="/assets/images/compliance.svg" alt="compliance">
                <h3 class="mt-3">{{ __('HomePage.expertiseHeadOne'); }}</h3>
                <p>{{ __('HomePage.expertiseDescOne'); }}</p>
                <a href="@if (app()->getLocale() == "en") {{ route('our-service-detail', $one->slug_eng) }} @else {{ route('our-service-detail.id', $one->slug) }} @endif">{{ __('HomePage.readMore'); }} &rarr;</a>
            </div>
            <div class="col-12 col-md-6 mt-5">
                <img src="/assets/images/refund.svg" alt="refund">
                <h3 class="mt-3">{{ __('HomePage.expertiseHeadTwo'); }}</h3>
                <p>{{ __('HomePage.expertiseDescTwo'); }}</p>
                <a href="@if (app()->getLocale() == "en") {{ route('our-service-detail', $two->slug_eng) }} @else {{ route('our-service-detail.id', $two->slug) }} @endif">{{ __('HomePage.readMore'); }} &rarr;</a>
            </div>
            <div class="col-12 col-md-6 mt-5">
                <img src="/assets/images/transfer.svg" alt="transfer">
                <h3 class="mt-3">{{ __('HomePage.expertiseHeadThree'); }}</h3>
                <p>{{ __('HomePage.expertiseDescThree'); }}</p>
                <a href="@if (app()->getLocale() == "en") {{ route('our-service-detail', $three->slug_eng) }} @else {{ route('our-service-detail.id', $three->slug) }} @endif">{{ __('HomePage.readMore'); }} &rarr;</a>
            </div>
            <div class="col-12 col-md-6 mt-5">
                <img src="/assets/images/audit.svg" alt="audit">
                <h3 class="mt-3">{{ __('HomePage.expertiseHeadFour'); }}</h3>
                <p>{{ __('HomePage.expertiseDescFour'); }}</p>
                <a href="@if (app()->getLocale() == "en") {{ route('our-service-detail', $four->slug_eng) }} @else {{ route('our-service-detail.id', $four->slug) }} @endif">{{ __('HomePage.readMore'); }} &rarr;</a>
            </div>
        </div>
        <div class="row consultation_cta mt-5">
            <div class="col-12">
                <a href="@if (app()->getLocale() == " en") {{ route("contact") }} @else {{ route("contact") }} @endif">{{ __('HomePage.consultationCta'); }} <img src="/assets/images/arrow.svg" class="ms-2" alt="arrow"></a>

            </div>
        </div>
    </div>
</section>
<section class="value py-5">
    <div class="container-fluid">
        <div class="row section_heading">
            <div class="col-12 text-center">
                <h2>Core Value</h2>
            </div>
        </div>
        <div class="row value_list mt-4">
            <div class="col-3 position-relative value_item p-0">
                <img src="/assets/images/1.png" class="w-100" alt="Professional">
                <h3>Professional</h3>
            </div>
            <div class="col-3 position-relative value_item p-0">
                <img src="/assets/images/2.png" class="w-100" alt="Trustwothy">
                <h3>Trustwothy</h3>
            </div>
            <div class="col-3 position-relative value_item p-0">
                <img src="/assets/images/3.png" class="w-100" alt="Creativity">
                <h3>Creativity</h3>
            </div>
            <div class="col-3 position-relative value_item p-0">
                <img src="/assets/images/4.png" class="w-100" alt="Prudent">
                <h3>Prudent</h3>
            </div>
        </div>
    </div>
</section>
<section class="services py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 left">
                <div class="row">
                    <div class="col-12">
                        <h2>{{ __('HomePage.headSolution'); }}</h2>
                    </div>
                    <div class="col-12">
                        <p>
                            {{ __('HomePage.descSolution'); }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 right">
                <div class="row services_list">
                    @foreach ($services as $service)
                    <a href="@if (app()->getLocale() == "en") {{ route('our-service-detail', $service->slug_eng) }} @else {{ route('our-service-detail.id', $service->slug) }} @endif" class="col-12 service_item d-flex align-items-center justify-content-between py-2">
                        <p class="text-start m-0 py-1">
                            @if (app()->getLocale() == "en")
                            {{ $service->title_eng }}
                            @else
                            {{ $service->title }}
                            @endif
                        </p>
                        <img src="/assets/images/arrow.svg" alt="arrow">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row team mt-5">
            <div class="col-12">
                <h2>{{ __('HomePage.headServiceOne'); }}<br>{{ __('HomePage.headServiceTwo'); }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img src="/assets/images/team-img-2.png" class="w-100" alt="ideatax team">
            </div>
        </div>
        <div class="row consultation_cta mt-5">
            <div class="col-12">
                <a href="@if (app()->getLocale() == "en") {{ route("contact") }} @else {{ route("contact.id") }} @endif">{{ __('HomePage.consultationCta'); }} <img src=" /assets/images/arrow.svg" class="ms-2" alt="arrow"></a>
            </div>
        </div>
    </div>
</section>
<section class="articles py-5">
    <div class="container">
        <div class="row section_heading">
            <div class="col-12 text-center">
                <h2>{{ __('HomePage.headArticle'); }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $item)
            <div class="col-12 col-md-6 ps-0 d-flex align-items-center article_item mt-5">
                <div class="article_img">
                    <img src="{{ asset("storage/" . $item->thumbnail) }}" alt="$item->title">
                </div>
                <div class="article_detail_home d-flex flex-column">
                    <p>{{ $item->articleCategory->title }} - {{ $item->updated_at->format('d M, Y H:i') }} WIB</p>
                    <a href="@if (app()->getLocale() == "en") {{ route('article-detail',$item->slug_eng) }}  @else {{ route('article-detail.id',$item->slug) }} @endif">{{ $item->title_eng }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="subscribe position-relative">
    <img src="/assets/images/subscribe.png" class="w-100 position-relative" alt="">
    <div class="subscribe_button py-5 py-md-0 d-flex flex-column align-items-center justify-content-center">
        <h2 class="position-relative">{{ __('HomePage.subHead'); }}</h2>
        <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#exampleModal">
            {{ __('HomePage.subLink'); }} <img src="/assets/images/arrow-white.svg" class="ms-3" alt="">
        </button>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('HomePage.subHead'); }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('home-subs') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 d-flex flex-column align-items-start">
                <label for="nama" class="form-label fs-6">Name</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="mb-3 d-flex flex-column align-items-start">
                <label for="email" class="form-label fs-6">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<section class="event py-5">
    <div class="container-fluid">
        <div class="row section_heading">
            <div class="col-12 text-center">
                <h2>{{ __('HomePage.headEvent'); }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($events as $item)
                <a href="@if (app()->getLocale() == "en") {{ route('tax-event', $item->slug_eng) }} @else {{ route('tax-event.id', $item->slug) }} @endif" class="col-6 col-md-3 d-flex flex-column event_item mt-4">
                <img src="{{ asset("storage/" . $item->photo) }}" class="w-100" alt="">
                <p>{{ $item->updated_at->format('M, d Y') }}</p>
                <h3>
                    @if (app()->getLocale() == "en")
                        {{ $item->title_eng }}</h3>
                    @else
                        {{ $item->title }}</h3>
                    @endif
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection

@endsection
