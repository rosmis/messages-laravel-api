<?php

// use App\Http\MessageController;
// use Illuminate\Http\Request;

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/{id}', [MessageController::class, 'getMessage']);

Route::post('/messages', [MessageController::class, 'createMessage'])->name('messages.createMessage');

Route::post('/messages/{id}', [MessageController::class, 'updateMessage'])->name('messages.updateMessage');
Route::post('/messages/{id}/remove', [MessageController::class, 'removeMessage'])->name('messages.removeMessage');

Route::delete('/messages', [MessageController::class, 'removeAllMessages']);
