<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contact.show');

Route::post('/contacts/store', [ContactController::class, 'store'])->name('contact.store');

Route::post('/file/upload', [ContactController::class, 'upload'])->name('file.upload');

Route::get('/posts', [ContactController::class, 'posts']);

