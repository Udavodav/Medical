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

Route::prefix('/admin')->name('admin.')->group(function (){
    Route::namespace('App\Http\Controllers\Admin\Specialist')->prefix('/specialist')->name('specialist.')->group(function (){
        Route::get('/', IndexController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::get('/{specialist}', ShowController::class)->name('show')->withTrashed();
        Route::get('/edit_data/{specialist}', EditDataController::class)->name('edit_data');
        Route::get('/edit_user/{user}', EditUserController::class)->name('edit_user');
        Route::get('/restore/{specialist}', RestoreController::class)->name('restore')->withTrashed();
        Route::post('/', StoreController::class)->name('store');
        Route::patch('/update_user/{user}', UpdateUserController::class)->name('update_user');
        Route::patch('/update_data/{user}', UpdateDataController::class)->name('update_data');
        Route::delete('/{specialist}', DeleteController::class)->name('delete');
    });
});
