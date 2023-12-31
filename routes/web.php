<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TypeDocumentController;
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
    Route::get('/type/{id}', [DocumentController::class, 'type'])->name('documents.type');
    Route::get('/{id}', [DocumentController::class, 'show'])->name('documents.show');
    Route::post('/', [DocumentController::class, 'create'])->name('documents.create');
    Route::delete('/{id}', [DocumentController::class, 'delete'])->name('documents.delete');
    Route::patch('/', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::post('/downloads', [DocumentController::class, 'download'])->name('documents.download');
});

Route::prefix('types')->group(function () {
    Route::get('/', [TypeDocumentController::class, 'index'])->name('types.index');
    Route::post('/', [TypeDocumentController::class, 'create'])->name('types.create');
    Route::patch('/', [TypeDocumentController::class, 'edit'])->name('types.edit');
    Route::delete('/{id}', [TypeDocumentController::class, 'delete'])->name('types.delete');
});

//мероприятия
Route::prefix('events')->group(function () {
    Route::get('/', [EventsController::class, 'getAllEvents'])->name('events.index');
//    Route::get('/{id}', [EventsController::class,'getOneEvent'])->name('events.show');
    Route::post('/', [EventsController::class, 'createEvent'])->name('events.create');
    Route::delete('/{id}', [EventsController::class, 'deleteEvent'])->name('events.delete');
    Route::patch('/', [EventsController::class, 'editEvent'])->name('events.edit');
    Route::get('/calendar', [EventsController::class, 'getCalendar'])->name('events.calendar');
    Route::get('/next', [EventsController::class, 'nextEvent'])->name('events.next');
    Route::get('/back', [EventsController::class, 'backEvent'])->name('events.back');
});

// Oauth Авторизация
Route::prefix('social-auth')->group(function () {
    Route::get('/{provider}', [SocialController::class, 'redirectToProvider'])->name('auth.social');
    Route::get('/{provider}/callback', [SocialController::class, 'handleProviderCallback'])->name('auth.social.callback');
});

// авторизация
Route::prefix('profile')->group(function () {
    Route::get('/', [SocialController::class, 'index'])->name('auth.index');
    Route::put('/', [SocialController::class])->name('auth.edit');
    Route::get('/logout', [SocialController::class, 'logout'])->name('auth.logout');
});

Route::prefix('users')->group(function () {
    Route::get('/', [\App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::post('/', [\App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
    Route::patch('/', [\App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
    Route::delete('/{id}', [\App\Http\Controllers\UsersController::class, 'delete'])->name('users.delete');
    Route::get('/logout', [SocialController::class, 'logout'])->name('auth.logout');
});
