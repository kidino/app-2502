<?php

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/notes', function(Request $request){
    return Note::paginate(10);
})->middleware('auth:sanctum');

Route::post('/login', [ LoginController::class, 'login' ])->name('api.login');

