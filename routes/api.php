<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [ContactsController::class, 'index'])->name('home');
Route::put('/{id}', [ContactsController::class, 'update']);
Route::get('/contato/{slug}', [ContactsController::class, 'show']);
Route::delete('/{id}', [ContactsController::class, 'destroy']);
Route::post('/adicionar-contato', [ContactsController::class, 'store'])->name('create-contact');
