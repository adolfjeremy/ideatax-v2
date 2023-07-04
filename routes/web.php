<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TaxUpdateController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TaxEventController;
use App\Http\Controllers\Admin\DiscussionController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\TaxUpdateCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ServicesController as AdminServicesController;
use App\Http\Controllers\Admin\TaxUpdateController as AdminTaxUpdateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/our-team/jonathan', '/jonathan-nainggolan', 301);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/our-team', [AboutController::class, 'team'])->name('our-team');
Route::get('/our-team/{id}', [AboutController::class, 'teamDetail'])->name('our-team-detail');

Route::get('/our-services', [ServicesController::class, 'index'])->name('our-services');

Route::get('/tax-update', [TaxUpdateController::class, 'index'])->name('update');
Route::get('/tax-update/category/{id}', [TaxUpdateController::class, 'sortByCategory'])->name('tax-update-category');
Route::get('/tax-update/{id}', [TaxUpdateController::class, 'detail'])->name('tax-update-detail');
Route::post('/tax-update/save', [TaxUpdateController::class, 'store'])->name('update-save');
Route::get('/tax-update/tax-consulting/{id}', [TaxUpdateController::class, 'discussionDetail'])->name('tax-consulting');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/category/{id}', [ArticleController::class, 'sortByCategory'])->name('article-category');
Route::get('/articles/event/{id}', [ArticleController::class, 'taxEvent'])->name('tax-event');
Route::get('/articles/{id}', [ArticleController::class, 'detail'])->name('article-detail');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/contact/send-mail', [ContactController::class, 'sendMail'])->name('send-mail');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->name('register');


Route::prefix('admin')
->middleware(['auth', 'admin'])
->group(function() {
    Route::resource('pages', PagesController::class);
    Route::resource('services', AdminServicesController::class);
    Route::resource('category', NewsCategoryController::class);
    Route::resource('article-category', ArticleCategoryController::class);
    Route::resource('articles', AdminArticleController::class);
    Route::resource('event', TaxEventController::class);
    Route::resource('update', AdminTaxUpdateController::class);
    Route::resource('tax-update-category', TaxUpdateCategoryController::class);
    Route::resource('discussion', DiscussionController::class);
    Route::resource('compro', CompanyProfileController::class);
    Route::resource('team', TeamController::class);
    Route::get('/answered', [DiscussionController::class, 'answered'])->name('answered');
});

Route::prefix('admin')
->middleware('auth')
->group(function() {
    Route::resource('user', UserController::class);
});

Route::get('sitemap', function() {
    return redirect(url('qbc/sitemap.xml'));
});



