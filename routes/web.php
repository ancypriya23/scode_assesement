<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
//create post route

Route::get('/create', [PostController::class, 'create']);
Route::post('/store', [PostController::class, 'storeManual'])->name('store');

Route::get('/', function () {
    return view('welcome');
});
