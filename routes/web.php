<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RoleController;
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
    Route::get('user',[UserController::class,'index'
    ])->name('index');

    // new user form
    Route::get('user/create',[UserController::class,'create'
    ])->name('create');

    // process new user form data
    Route::post('user',[UserController::class,'store'
    ])->name('store');

    Route::get('user/{user}/edit',[UserController::class,'edit'
    ])->name('edit');

   Route::patch('user/{id}',[UserController::class,'update'
   ])->name('update');
});


// Route::middleware('auth')->name('role.')->group(function(){

    // // Roles listing
    // Route::get('/role',[RoleController::class,'index'])->name('index');

    // // new role form
    // Route::get('/role/create',[RoleController::class,'create'])->name('create');

    // // process new role form data
    // Route::post('/role',[RoleController ::class,'store'])->name('store');

    // // process new role form data
    // Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('edit');


// });

Route::resource('role',RoleController::class)->middleware('auth');

Route::resource('note',NoteController::class)->middleware('auth');

Route::resource('demo', DemoController::class);

Route::view('test-login', 'layouts.test-login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
