<?php

use App\Http\Controllers\GroupProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GroupProfileController::class, 'index']);
Route::post('/', [GroupProfileController::class, 'store']);
