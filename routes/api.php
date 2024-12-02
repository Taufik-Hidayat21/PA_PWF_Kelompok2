<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KamarController;

Route::apiResource('kamars', KamarController::class);
Route::get('kamar', [KamarController::class, 'create'])->name('kamar.create');
Route::get('kamar/{id}', [KamarController::class, 'edit'])->name('kamar.edit');
