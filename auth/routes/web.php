<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('home-re');
Route::middleware(['web'])->group(function ()
{
   
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index1'])->name('home');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified','admin']], function ()
    {
        Route::get('/',[\App\Http\Controllers\AdminController::class, 'index']);
    });
    Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', 'verified','user']], function ()
    {
        Route::get('/',[\App\Http\Controllers\UserController::class, 'index']);
    });

});

