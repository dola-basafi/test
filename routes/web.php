<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/login', function (){
    if (Auth::check()) {
        return redirect()->route('taskIndex')->with('success','anda sudah login');
    }
    return view('login');
})->name('loginForm');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware(['auth'])->group(function (){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::prefix('task')->group(function(){
        Route::controller(TaskController::class)->group(function(){
            Route::get('/','index')->name('taskIndex');
            Route::post('/create','store')->name('taskCreate');
            Route::get('/create','create')->name('createForm');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/edit/{id}','update')->name('update');
            Route::delete('/delete/{id}','destroy')->name('del');
        });
    });
});


