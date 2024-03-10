<div class="news_item">
    <div class="news_image_container">
        <a href="{{ app()->getLocale() == "en" ? $routeEng : $route }}"><img src="{{ asset("storage/" . $image) }}" alt="{{ app()->getLocale() == "en" ? $titleEng : $title }}"></a>
    </div>
    <div class="text_container">
        <h3>
            <a href="{{ app()->getLocale() == "en" ? $routeEng : $route }}">
                @if (app()->getLocale() == "en")
                    {!! str_limit($titleEng, $limit = 61) !!}
                @endif
                @if (app()->getLocale() == "id")
                    {!! str_limit($title, $limit = 61) !!}
                @endif
            </a>
        </h3>
        <div class="timestamp">
            <a href="{{ app()->getLocale() == "en" ? $categoryEngRoute : $categoryRoute }}" class="news_category">{{ $category }}</a>
            <span>{{ $timestamp->format('d M, Y H:i') }} WIB</span>
        </div>
    </div>
</div>