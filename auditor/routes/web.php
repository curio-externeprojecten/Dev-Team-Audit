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

// auth routes & global routes
Auth::routes();
Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard']);
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/action', [App\Http\Controllers\ActionController::class, 'getAction'])->name('getAction');

//Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'getActions'])->name('dashboard');

// action received
Route::get('/received', [App\Http\Controllers\ActionController::class, 'received']);
Route::post('/received/action', [App\Http\Controllers\ActionController::class, 'PE_actionReceiver']);
Route::get('/received/action/{id}', [App\Http\Controllers\ActionController::class, 'PE_showAction']);

// change owner from action problem_owner
Route::post('actions/change_owner', [App\Http\Controllers\ActionController::class, 'sendAction'] )->name('actions.change_owner');

// sended actions from problem_owner to action_owner
Route::get('/problem_owner_sended', [App\Http\Controllers\ActionController::class, 'sendedActions'])->name('sendedActions');

Route::get('action_owner', function(){
    return view('action_owner\action');
});

Route::get('action/create', [App\Http\Controllers\ActionController::class, 'createActionPage']);

Route::post('progress_action',[App\Http\Controllers\ProgressController::class, 'SendProgress']);

Route::post('finish_action', [App\Http\Controllers\StatusController::class, 'FinishAction']);

// DEBUG
Route::get('change/role/{role}', [App\Http\Controllers\DashboardController::class, 'changeRole']);
