<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostApiController;
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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/postsApi', [PostApiController::class, 'index'])->name('postApi.index');
Route::get('/postsApi/{post}', [PostApiController::class, 'show'])->name('postApi.show');
Route::post('/postsApi', [PostApiController::class, 'store'])->name('postApi.store');
Route::put('/postsApi/{post}', [PostApiController::class, 'update'])->name('postApi.update');
Route::delete('/postsApi/{post}', [PostApiController::class, 'destroy'])->name('postApi.destroy');
Route::get('/hello', function () {
    return "Hello World!";
  });

