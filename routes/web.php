<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContactsController::class, 'index'])->name('home');
Route::post('/', [ContactsController::class, 'update']);
Route::delete('/{id}', [ContactsController::class, 'destroy']);
Route::get('/adicionar-contato', function () {
    return view('form');
})->name('form-create');
Route::post('/adicionar-contato', [ContactsController::class, 'store'])->name('create-contact');
