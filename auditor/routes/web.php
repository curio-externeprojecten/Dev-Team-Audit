<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// GLOBAL ROUTES

Auth::routes();
Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard']);
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/action', [App\Http\Controllers\ActionController::class, 'getAction'])->name('getAction');

// AUDITOR

Route::get('create_action', [App\Http\Controllers\ActionController::class, 'createAction']);
Route::post('create_action', [App\Http\Controllers\ActionController::class, 'saveAction'])->name('auditor.create_action');


Route::get('/auditor/received', [App\Http\Controllers\ActionController::class, 'AU_received'])->name('AU_received');
Route::post('/auditor/received/action', [App\Http\Controllers\ActionController::class, 'AU_actionReceiver'])->name('AU_receivedAction');
Route::get('/auditor/received/action/{id}', [App\Http\Controllers\ActionController::class, 'AU_showAction'])->name('AU_receivedShowAction');
Route::get('/auditor/actions/closed', [App\Http\Controllers\ActionController::class, 'AU_showClosedActions']);


// PROBLEM OWNER

Route::get('/received', [App\Http\Controllers\ActionController::class, 'received']);
Route::post('/received/action', [App\Http\Controllers\ActionController::class, 'PE_actionReceiver'])->name('PE_receivedAction');
Route::get('/received/action/{id}', [App\Http\Controllers\ActionController::class, 'PE_showAction'])->name('PE_receivedShowAction');
// sended actions from problem_owner to action_owner
Route::get('/problem_owner_sended', [App\Http\Controllers\ActionController::class, 'sendedActions'])->name('sendedActions');

// ACTION OWNER

Route::post('voortgang_action', [App\Http\Controllers\ProgressController::class, 'UpdateVoortgang'])->name('action.voortgang');
Route::get('action_owner', function(){
    return view('action_owner\action');
});

// ROUTE FOR: UPDATE PROGRESS 
Route::put('progress_action/{id}',[App\Http\Controllers\ProgressController::class, 'SendProgress'])->name('progress.action');
// ROUTE FOR: UPDATE COMMENT
Route::put('comment_action/{id}', [App\Http\Controllers\ActionController::class, 'UpdateComment'])->name('comment.action');
//Route FOR: FINISH ACTION and send it to the problem owner
Route::post('finish_action', [App\Http\Controllers\StatusController::class, 'FinishAction']);




// DEBUG

Route::get('change/role/{role}', [App\Http\Controllers\DashboardController::class, 'changeRole']);
// change owner from action problem_owner
Route::post('actions/change_owner', [App\Http\Controllers\ActionController::class, 'sendAction'] )->name('actions.change_owner');
