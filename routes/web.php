<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\DiskController;
use App\Http\Controllers\RecentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RecentController::class, 'getRecent'])->name('index');

//документы
Route::prefix('documents')->group(function () {
    Route::get('/create', [DocumentController::class, 'createShow'])->name('documents.createShow');
    Route::get('/', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/{id}', [DocumentController::class, 'show'])->name('documents.show');
    Route::post('/', [DocumentController::class, 'create'])->name('documents.create');
    Route::delete('/{id}', [DocumentController::class, 'delete'])->name('documents.delete');
    Route::put('/{id}', [DocumentController::class, 'edit'])->name('documents.edit');
});

//мероприятия
Route::prefix('events')->group(function () {
    Route::get('/', [EventsController::class, 'getAllEvents'])->name('events.index');
    Route::get('/{id}', [EventsController::class,'getOneEvent'])->name('events.show');
    Route::post('/', [EventsController::class, 'postEvent'])->name('events.post');
    Route::delete('/{id}', [EventsController::class, 'deleteEvent'])->name('events.delete');
    Route::put('/{id}', [EventsController::class, 'putEvent'])->name('events.put');
});

// Oauth Авторизация
Route::prefix('social-auth')->group(function () {
    Route::get('/{provider}', [SocialController::class, 'redirectToProvider'])->name('auth.social');
    Route::get('/{provider}/callback', [SocialController::class, 'handleProviderCallback'])->name('auth.social.callback');
});

// авторизация
Route::prefix('profile')->group(function () {
    Route::get('/', [SocialController::class, 'profile'])->name('auth.profile');
    Route::put('/', [SocialController::class])->name('auth.edit');
    Route::get('/logout', [SocialController::class, 'logout'])->name('auth.logout');
});
