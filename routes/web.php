<?php

use App\Http\Controllers\MessageController;
use App\Models\Message;
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

Route::get('/home', [MessageController::class, 'index'])->name('messages.index');
Route::get('/home/{id}/edit', [MessageController::class, 'getMessage']);