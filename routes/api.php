<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\NotesController;

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
Route::get('/gettrainers', [TrainerController::class, 'getTrainerList']);
Route::get('/notes/client/{client_id}', [NotesController::class, 'getClientNotesList']);
Route::get('/notes/trainer/{trainer_id}', [NotesController::class, 'getTrainertNotesList']);
Route::post('/note/create/', [NotesController::class, 'createNote']);
Route::get('/check/trainer/{trainer_id}', [NotesController::class, 'checkTrainerAvaliableDates']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
