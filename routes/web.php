<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->name('user.')->group(function(){

    // user listing 
    Route::get('/user',[UserController::class,'index'
    ])->name('index');

    // new user form
    Route::get('/user/create',[UserController::class,'create'
    ])->name('create');

    // process new user form data
    Route::post('/user',[UserController::class,'store'
    ])->name('store');
    
});


Route::middleware('auth')->group(function () {   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
