<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Site\CountryController;
use App\Http\Controllers\Site\EnquiryController;
use App\Http\Controllers\Site\FilterController;
use App\Http\Controllers\Site\HeroController;
use App\Http\Controllers\Site\PagesController;
use App\Http\Controllers\Site\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/storage', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
});

Route::get('/start', [PagesController::class, 'start'])->name('start');
Route::post('/start', [PagesController::class, 'startOk'])->name('start.ok');

Route::middleware('started')
    ->group(function () {

        /**
         * Pages Routes
         */
        Route::get('/', [PagesController::class, 'index'])->name('index');
        Route::get('/country/load', [PagesController::class, 'loadMoreCountry']);
        Route::get('/vote', [PagesController::class, 'vote'])->name('vote');
        Route::get('/team', [PagesController::class, 'team'])->name('team');
        Route::get('/vision', [PagesController::class, 'vision'])->name('vision');
        Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
        Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
        Route::get('/help', [PagesController::class, 'help'])->name('help');

        /**
         * Auth Routes
         */
        Route::get('logout', [SocialLoginController::class, 'logout'])->name('logout');
        Route::get('auth/{provider}', [SocialLoginController::class, 'redirect']);
        Route::get('auth/{provider}/callback', [SocialLoginController::class, 'handleCallback']);

        /**
         * Hero Routes
         */
        Route::prefix('hero')
            ->name('hero.')
            ->group(function () {
                Route::get('/create/{country?}', [HeroController::class, 'create'])->name('create');
                Route::get('', [HeroController::class, 'index'])->name('index');
                Route::get('/{slug}', [HeroController::class, 'show'])->name('show');
                Route::post('/store', [HeroController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [HeroController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [HeroController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [HeroController::class, 'destroy'])->name('delete');
                Route::put('/vote/{id}', [HeroController::class, 'vote'])->name('vote');
                Route::post('/vote', [HeroController::class, 'voteFromSelection'])->name('vote.selection');
            });

        /**
         * Country Routes
         */
        Route::prefix('country')
            ->name('country.')
            ->group(function () {
                Route::get('', [CountryController::class, 'index'])->name('index');
                Route::get('/{slug}', [CountryController::class, 'show'])->name('show');
                Route::post('/store', [CountryController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [CountryController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [CountryController::class, 'destroy'])->name('delete');
            });

        /**
         * Post Routes
         */
        Route::prefix('post')
            ->name('post.')
            ->group(function () {
                Route::get('', [PostController::class, 'index'])->name('index');
                Route::get('/{slug}', [PostController::class, 'show'])->name('show');
            });

        /**
         * Enquiry Routes
         */
        Route::prefix('enquiry')
            ->name('enquiry.')
            ->group(function () {
                Route::post('/store', [EnquiryController::class, 'store'])->name('store');
            });

        /**
         * Filter Routes
         */
        Route::prefix('')
            ->name('filter.')
            ->group(function () {
                Route::get('/select-country', [FilterController::class, 'showSelectCountryPage'])->name('select.country');
                Route::get('/hero', [FilterController::class, 'filter'])->name('result');
            });


    });

require __DIR__ . '/admin.php';
