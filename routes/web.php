<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PhotoController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    /* CATEGORIES */
    Route::get('/categories',[CategorieController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategorieController::class,'create'])->name('categories.create');
    Route::post('/categories/store',[CategorieController::class,'store'])->name('categories.store');
    Route::get('/categories/{categorie}/edit',[CategorieController::class,'edit'])->name('categories.edit');
    Route::post('/categories/{categorie}/update',[CategorieController::class,'update'])->name('categories.update');
    Route::get('/categories/{categorie}/destroy',[CategorieController::class,'destroy'])->name('categories.destroy');

     /* PHOTOS */
     Route::get('/photos',[PhotoController::class,'index'])->name('photos.index');
     Route::get('/photos/create',[PhotoController::class,'create'])->name('photos.create');
     Route::post('/photos/store',[PhotoController::class,'store'])->name('photos.store');
     Route::get('/photos/{photo}/edit',[PhotoController::class,'edit'])->name('photos.edit');
     Route::post('/photos/{photo}/update',[PhotoController::class,'update'])->name('photos.update');
     Route::get('/photos/{photo}/destroy',[PhotoController::class,'destroy'])->name('photos.destroy');
     Route::any('/photos/find',[PhotoController::class,'find'])->name('photos.find');

});

