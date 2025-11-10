<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainController::class)->name('main.index');

Route::get('/image/{id}', [ImageController::class, 'view'])->name('image.view');

Route::resource('/alumno', AlumnoController::class);
