<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard']);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/action', [App\Http\Controllers\ActionController::class, 'getAction'])->name('getAction');

//Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'getActions'])->name('dashboard');

Route::get('problem_dashboard', function () {
    return view('problem_owner.dashboard');
});

Route::get('action_owner', function(){
    return view('action_owner\action');
});
