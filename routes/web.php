<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('{view}', ApplicationController::class)->where('view', '(.*)');