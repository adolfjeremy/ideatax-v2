<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // modify this to your own needs
        SitemapGenerator::create(config('app.url'))
        ->hasCrawled(function (Url $url) {
            if ($url->segment(1) === 'storage') {
                return;
            }
            if ($url->segment(1) === 'lang') {
                return;
            }

            return $url;
            if ($url->segment(1) === null) {
                $url->setPriority(1)
                    ->setLastModificationDate(Carbon::today());
            }
        })
        ->writeToFile(public_path('/qbc/sitemap.xml'));
    }
}
