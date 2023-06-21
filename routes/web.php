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
Route::get('/documents', [DocumentController::class, 'getAllDocument'])->name('documents.getAll');
Route::get('/documents/{id}', [DocumentController::class, 'getOneDocument'])->name('documents.getOne');
Route::post('/documents', [DocumentController::class, 'postDocument'])->name('documents.post');
Route::delete('/documents/{id}', [DocumentController::class, 'deleteDocument'])->name('documents.delete');
Route::put('/documents/{id}', [DocumentController::class, 'putDocument'])->name('documents.put');

//мероприятия
Route::get('/events', [EventsController::class, 'getAllEvents'])->name('events.getAll');
Route::get('/events/{id}', [EventsController::class,'getOneEvent'])->name('events.getOne');
Route::post('/events', [EventsController::class, 'postEvent'])->name('events.post');
Route::delete('/events/{id}', [EventsController::class, 'deleteEvent'])->name('events.delete');
Route::put('/events/{id}', [EventsController::class, 'putEvent'])->name('events.put');

// Oauth Авторизация
Route::get('/social-auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('auth.social');
Route::get('/social-auth/{provider}/callback', [SocialController::class, 'handleProviderCallback'])->name('auth.social.callback');
Route::get('/auth/logout', [SocialController::class, 'logout'])->name('auth.logout');

Route::get('/disk', [DiskController::class, 'getDisk']);
Route::post('/disk', [DiskController::class, 'postDoc']);
