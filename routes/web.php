<?php

use App\Http\Controllers\Client\CategoriesController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\DoctorWriteController;
use App\Http\Controllers\Client\GetServicesController;
use App\Http\Controllers\Client\GetTimesController;
use App\Http\Controllers\Client\GetWriteDoctorController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\SpecialistController;
use App\Http\Controllers\Client\SpecialistDetailsController;
use App\Http\Controllers\Client\StoreVisitController;
use App\Http\Controllers\Client\StoreWriteController;
use App\Http\Controllers\Client\VisitController;
use App\Http\Controllers\Client\WriteController;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);



Route::namespace('App\Http\Controllers\Client')->name('client.')->group(function (){
    Route::get('/', IndexController::class)->name('index');
    Route::get('/contacts', ContactController::class)->name('contacts');
    Route::get('/categories', CategoriesController::class)->name('categories');
    Route::get('/services/{category}', ServiceController::class)->name('services');
    Route::get('/specialists', SpecialistController::class)->name('specialists');
    Route::get('/specialists/{specialist}', SpecialistDetailsController::class)->name('specialist_details');

});


Route::namespace('App\Http\Controllers\Client')->name('client.')->middleware(['auth', 'client', 'verified'])->group(function (){
    Route::get('/write', WriteController::class)->name('write');
    Route::get('/times', GetTimesController::class)->name('get_times');
    Route::get('/services-of-doctor', GetServicesController::class)->name('get_services');
    Route::get('/doctors-of-competence', GetSpecialistsController::class)->name('get_specialists');
    Route::post('/write', StoreWriteController::class)->name('store_write');
    Route::get('/write-delete/{write}', DeleteWriteController::class)->name('delete_write');
    Route::get('/visits', VisitController::class)->name('visits');
    Route::post('/comment', StoreCommentController::class);

});

Route::namespace('App\Http\Controllers\Client')->name('client.')->middleware(['auth', 'doctor'])->group(function (){
    Route::get('/doctor-writes', GetWriteDoctorController::class)->name('get_doctor_writes');
    Route::get('/doctor-visits', GetVisitDoctorController::class)->name('get_doctor_visits');
    Route::get('/doctor/writes', DoctorWriteController::class)->name('doctor_writes');
    Route::get('/doctor/visits', DoctorVisitController::class)->name('doctor_visits');
    Route::post('/doctor/create-visit', StoreVisitController::class)->name('store_visit');
    Route::patch('/doctor/update-visit', UpdateVisitController::class)->name('update_visit');

});

Route::namespace('App\Http\Controllers\Client')->name('client.')->middleware(['auth', 'medsister'])->group(function (){
    Route::get('/medsister', MedsisterController::class)->name('medsister');
    Route::get('/doctor/search-client', SearchClientController::class);
    Route::post('/medsister/create-visit', MedsisterCreateVisitController::class);
});


Route::prefix('/admin')->name('admin.')->middleware(['auth', 'admin'])->group(function (){
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
        Route::get('/create', CreateController::class)->name('create');
        Route::get('/{category}', ShowController::class)->name('show')->withTrashed();
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

    Route::namespace('App\Http\Controllers\Admin\Comment')->prefix('/comment')->name('comment.')->group(function (){
        Route::get('/', IndexController::class)->name('index')->withTrashed();
        Route::delete('/{comment}', DeleteController::class)->name('delete');
        Route::get('/restore/{comment}', RestoreController::class)->name('restore')->withTrashed();
    });
});
