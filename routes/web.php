<?php

use App\Http\Middleware\verifyAcces;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LikeController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isModerator;

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


Route::get('/', [PhotoController::class,'home']);
Route::get('/categories',[CategorieController::class,'index'])->name('categories.index');

Route::post('/photos/find',[PhotoController::class,'find'])->name('photos.find');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');
    Route::get('/photos/likes',[LikeController::class,'likes'])->name('photos.likes');
    Route::post('/photos/{photo}/liker',[LikeController::class,'liker'])->name('photos.liker');
    /*----------------------DOWNLOAD---------------------------*/
    Route::get("/photos/{photo}/download",[DownloadController::class,'download'])->name("photos.download");
    /*---------------------CATEGORIES--------------------------*/    
   
    Route::middleware([isModerator::class])->group(function () {
        
        Route::get('/categories/create',[CategorieController::class,'create'])->name('categories.create');
        Route::post('/categories/store',[CategorieController::class,'store'])->name('categories.store');
        Route::get('/categories/{categorie}/edit',[CategorieController::class,'edit'])->name('categories.edit');
        Route::post('/categories/{categorie}/update',[CategorieController::class,'update'])->name('categories.update');
        Route::get('/photos',[PhotoController::class,'index'])->name('photos.index');
        Route::middleware([isAdmin::class])->group(function () {
            
            Route::get('/categories/{categorie}/destroy',[CategorieController::class,'destroy'])->name('categories.destroy');
            Route::get('/photos/{photo}/destroy',[PhotoController::class,'destroy'])->name('photos.destroy');

        });
       
        /*------------------PHOTOS--------------------------------*/
        
        Route::get('/photos/create',[PhotoController::class,'create'])->name('photos.create');
        Route::post('/photos/store',[PhotoController::class,'store'])->name('photos.store');
        Route::get('/photos/{photo}/edit',[PhotoController::class,'edit'])->name('photos.edit');
        Route::post('/photos/{photo}/update',[PhotoController::class,'update'])->name('photos.update');
        
        

    });
    

});

