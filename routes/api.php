<?php

use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\VoteController;
use Illuminate\Support\Facades\Route;

Route::put('/vote/{id}', [VoteController::class, 'vote']);

Route::post('/search', [SearchController::class, 'search']);
