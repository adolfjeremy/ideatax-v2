<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewsItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     /**
     * The alert type.
     * @var string
     *
     */
    public $routeEng;
    public $route;
    public $image;
    public $titleEng;
    public $title;
    public $categoryEngRoute;
    public $categoryRoute;
    public $category;
    public $timestamp;

    public function __construct(
        $routeEng,
        $route,
        $image,
        $titleEng,
        $title,
        $categoryEngRoute,
        $categoryRoute,
        $category,
        $timestamp)
    {
        $this->routeEng=$routeEng;
        $this->route=$route;
        $this->image=$image;
        $this->titleEng=$titleEng;
        $this->title=$title;
        $this->categoryEngRoute=$categoryEngRoute;
        $this->categoryRoute=$categoryRoute;
        $this->category=$category;
        $this->timestamp=$timestamp;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.news-item');
    }
}
