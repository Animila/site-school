<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

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
    $name = 'Sofia';
    return view('welcome', compact('name'));
});

Route::get('/documents', [DocumentController::class, 'getAllDocument'])->name('getalldocs');
Route::get('/documents/{id}', [DocumentController::class, 'getOneDocument'])->name('getdoc');

Route::post('/documents', [DocumentController::class, 'postDocument'])->name('postdoc');

Route::delete('/documents/{id}', [DocumentController::class, 'deleteDocument'])->name('deletedoc');

Route::put('/documents/{id}', [DocumentController::class, 'putDocument'])->name('putdoc');

