<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SupporterController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VisionController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
    ->name('admin.')
    ->middleware('guest:admin')
    ->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });

Route::prefix('admin')
    ->middleware('auth:admin')
    ->name('admin.')
    ->group(function () {

        Route::any('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/profile', [AdminController::class, 'showProfile'])->name('profile');
        Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile');
        Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('password');
        Route::put('/change-password', [AdminController::class, 'updatePassword'])->name('password');

        Route::get('/', function () {
            return view('admin.index');
        })->name('index');

        /**
         * User Routes
         */
        Route::prefix('users')
            ->group(function () {
                Route::get('', [UserController::class, 'index'])->name('user');
                Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
                Route::get('/create', [UserController::class, 'create'])->name('user.create');
                Route::post('/store', [UserController::class, 'store'])->name('user.store');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
                Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
                Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
            });

        /**
         * Page Routes
         */
        Route::prefix('page')
            ->group(function () {
                Route::get('', [PageController::class, 'index'])->name('page');
                Route::get('/show/{id}', [PageController::class, 'show'])->name('page.show');
                Route::get('/create', [PageController::class, 'create'])->name('page.create');
                Route::post('/store', [PageController::class, 'store'])->name('page.store');
                Route::get('/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
                Route::put('/update/{id}', [PageController::class, 'update'])->name('page.update');
                Route::get('/delete/{id}', [PageController::class, 'destroy'])->name('page.destroy');
            });

        /**
         * Enquiry Routes
         */
        Route::prefix('enquiry')
            ->group(function () {
                Route::get('', [EnquiryController::class, 'index'])->name('enquiry');
                Route::get('/show/{id}', [EnquiryController::class, 'show'])->name('enquiry.show');
                Route::get('/delete/{id}', [EnquiryController::class, 'destroy'])->name('enquiry.destroy');
            });

        /**
         * Country Routes
         */
        Route::prefix('country')
            ->group(function () {
                Route::get('', [CountryController::class, 'index'])->name('country');
                Route::get('/show/{id}', [CountryController::class, 'show'])->name('country.show');
                Route::get('/create', [CountryController::class, 'create'])->name('country.create');
                Route::post('/store', [CountryController::class, 'store'])->name('country.store');
                Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
                Route::put('/update/{id}', [CountryController::class, 'update'])->name('country.update');
                Route::get('/delete/{id}', [CountryController::class, 'destroy'])->name('country.destroy');
            });

        /**
         * Supporter Routes
         */
        Route::prefix('supporter')
            ->group(function () {
                Route::get('', [SupporterController::class, 'index'])->name('supporter');
                Route::get('/show/{id}', [SupporterController::class, 'show'])->name('supporter.show');
                Route::get('/create', [SupporterController::class, 'create'])->name('supporter.create');
                Route::post('/store', [SupporterController::class, 'store'])->name('supporter.store');
                Route::get('/edit/{id}', [SupporterController::class, 'edit'])->name('supporter.edit');
                Route::put('/update/{id}', [SupporterController::class, 'update'])->name('supporter.update');
                Route::get('/delete/{id}', [SupporterController::class, 'destroy'])->name('supporter.destroy');
            });

        /**
         * Setting Routes
         */
        Route::prefix('setting')
            ->group(function () {
                Route::get('', [SettingController::class, 'index'])->name('setting');
                Route::get('/show/{id}', [SettingController::class, 'show'])->name('setting.show');
                Route::get('/create', [SettingController::class, 'create'])->name('setting.create');
                Route::post('/store', [SettingController::class, 'store'])->name('setting.store');
                Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('setting.edit');
                Route::put('/update/{id}', [SettingController::class, 'update'])->name('setting.update');
                Route::get('/delete/{id}', [SettingController::class, 'destroy'])->name('setting.destroy');
            });

        /**
         * Team Routes
         */
        Route::prefix('team')
            ->group(function () {
                Route::get('', [TeamController::class, 'index'])->name('team');
                Route::get('/show/{id}', [TeamController::class, 'show'])->name('team.show');
                Route::get('/create', [TeamController::class, 'create'])->name('team.create');
                Route::post('/store', [TeamController::class, 'store'])->name('team.store');
                Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
                Route::put('/update/{id}', [TeamController::class, 'update'])->name('team.update');
                Route::get('/delete/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
            });

        /**
         * Vision Routes
         */
        Route::prefix('vision')
            ->group(function () {
                Route::get('', [VisionController::class, 'index'])->name('vision');
                Route::get('/show/{id}', [VisionController::class, 'show'])->name('vision.show');
                Route::get('/create', [VisionController::class, 'create'])->name('vision.create');
                Route::post('/store', [VisionController::class, 'store'])->name('vision.store');
                Route::get('/edit/{id}', [VisionController::class, 'edit'])->name('vision.edit');
                Route::put('/update/{id}', [VisionController::class, 'update'])->name('vision.update');
                Route::get('/delete/{id}', [VisionController::class, 'destroy'])->name('vision.destroy');
            });

        /**
         * Hero Routes
         */
        Route::prefix('hero')
            ->group(function () {
                Route::get('', [HeroController::class, 'index'])->name('hero');
                Route::get('/unverified', [HeroController::class, 'unverified'])->name('hero.unverified');
                Route::get('/show/{id}', [HeroController::class, 'show'])->name('hero.show');
                Route::get('/create', [HeroController::class, 'create'])->name('hero.create');
                Route::post('/store', [HeroController::class, 'store'])->name('hero.store');
                Route::get('/edit/{id}', [HeroController::class, 'edit'])->name('hero.edit');
                Route::put('/update/{id}', [HeroController::class, 'update'])->name('hero.update');
                Route::get('/delete/{id}', [HeroController::class, 'destroy'])->name('hero.destroy');
                Route::get('/verify/{id}', [HeroController::class, 'verify'])->name('hero.verify');
            });

        /**
         * Page Routes
         */
        Route::prefix('post')
            ->group(function () {
                Route::get('', [PostController::class, 'index'])->name('post');
                Route::get('/show/{id}', [PostController::class, 'show'])->name('post.show');
                Route::get('/create', [PostController::class, 'create'])->name('post.create');
                Route::post('/store', [PostController::class, 'store'])->name('post.store');
                Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
                Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
                Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
            });

    });
