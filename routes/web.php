<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers\Client')->name('client.')->group(function (){
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
        Route::get('/edit_data/{specialist}', EditDataController::class)->name('edit_data')->withTrashed();
        Route::get('/edit_user/{user}', EditUserController::class)->name('edit_user')->withTrashed();
        Route::get('/restore/{specialist}', RestoreController::class)->name('restore')->withTrashed();
        Route::post('/', StoreController::class)->name('store');
        Route::post('/services', StoreServiceController::class)->name('store_service');
        Route::patch('/update_user/{user}', UpdateUserController::class)->name('update_user')->withTrashed();
        Route::patch('/update_data/{specialist}', UpdateDataController::class)->name('update_data')->withTrashed();
        Route::delete('/{specialist}', DeleteController::class)->name('delete');
        Route::delete('/{spec}/{serv}', DeleteServiceController::class)->name('delete_service')->withTrashed();
    });

    Route::namespace('App\Http\Controllers\Admin\Service')->prefix('/service')->name('service.')->group(function (){
        Route::get('/{category}/create', CreateController::class)->name('create');
        Route::get('/{specialist}/add', AddController::class)->name('add')->withTrashed();
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{category}/edit/{service}', EditController::class)->name('edit')->withTrashed();
        Route::patch('/update/{service}', UpdateController::class)->name('update')->withTrashed();
        Route::delete('/{service}', DeleteController::class)->name('delete');
        Route::get('/restore/{service}', RestoreController::class)->name('restore')->withTrashed();
    });

    Route::namespace('App\Http\Controllers\Admin\Category')->prefix('/category')->name('category.')->group(function (){
        Route::get('/', IndexController::class)->name('index');
        Route::get('/{category}', ShowController::class)->name('show')->withTrashed();
        Route::get('/create', CreateController::class)->name('create');
        Route::get('/edit/{category}', EditController::class)->name('edit')->withTrashed();
        Route::patch('/update/{category}', UpdateController::class)->name('update')->withTrashed();
        Route::post('/', StoreController::class)->name('store');
        Route::delete('/{category}', DeleteController::class)->name('delete');
        Route::get('/restore/{category}', RestoreController::class)->name('restore')->withTrashed();
    });

    Route::namespace('App\Http\Controllers\Admin\Competence')->prefix('/competence')->name('competence.')->group(function (){
        Route::get('/', IndexController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::get('/edit/{competence}', EditController::class)->name('edit')->withTrashed();
        Route::patch('/update/{competence}', UpdateController::class)->name('update')->withTrashed();
        Route::post('/', StoreController::class)->name('store');
        Route::delete('/{competence}', DeleteController::class)->name('delete');
        Route::get('/restore/{competence}', RestoreController::class)->name('restore')->withTrashed();
    });
});
