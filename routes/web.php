<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers\Client')->prefix('/client')->name('client.')->group(function (){
    Route::get('/', IndexController::class)->name('index');
    Route::get('/contacts', ContactController::class)->name('contacts');
    Route::get('/categories', CategoriesController::class)->name('categories');
    Route::get('/services/{category}', ServiceController::class)->name('services');
    Route::get('/specialists', SpecialistController::class)->name('specialists');
});
