<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SocialController;

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

Route::get('/', function () {
    return view('welcome');
})->name('index');

//документы
Route::get('/documents', [DocumentController::class, 'getAllDocument'])->name('getalldocs');
Route::get('/documents/{id}', [DocumentController::class, 'getOneDocument'])->name('getdoc');

Route::post('/documents', [DocumentController::class, 'postDocument'])->name('postdoc');

Route::delete('/documents/{id}', [DocumentController::class, 'deleteDocument'])->name('deletedoc');

Route::put('/documents/{id}', [DocumentController::class, 'putDocument'])->name('putdoc');

//мероприятия
Route::get('/events', [EventsController::class, 'getAllEvents'])->name('getallevents');
Route::get('/events/{id}', [EventsController::class,'getOneEvent'])->name('getevent');

Route::post('/events', [EventsController::class, 'postEvent'])->name('postevent');

Route::delete('/events/{id}', [EventsController::class, 'deleteEvent'])->name('deleteevent');

Route::put('/events/{id}', [EventsController::class, 'putEvent'])->name('putevent');

// Oauth Авторизация
Route::get('/social-auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('auth.social');
Route::get('/social-auth/{provider}/callback', [SocialController::class, 'handleProviderCallback'])->name('auth.social.callback');
Route::get('/auth/logout', [SocialController::class, 'logout'])->name('auth.logout');
