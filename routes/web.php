<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatigoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdduserController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\HomepageController;

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



Route::get('/Singup', function () {
    return view('singup');
});

Route::get('/admin36', function () {
    return view('pages.jacket');
})->middleware(['auth', 'verified']);


Route::middleware(['auth','admin'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('pages.jacket');
    })->name('dashboard');
    
    
    // User Routs..................    check 
    Route::get('user', [AdduserController::class, 'index'])->name('user.index');
    Route::post('user', [AdduserController::class, 'store'])->name('user.insert');
    Route::post('/user/edit', [AdduserController::class, 'edit']);
    Route::post('/user_singup', [AdduserController::class, 'c_store']);
    Route::get('user_destroy', [AdduserController::class, 'destroy']);
    
    // catigories............................... check
    Route::get('/cat', [CatigoryController::class, 'index'])->name('cat.index');
    Route::post('/cat', [CatigoryController::class, 'store'])->name('cat.insert');
    Route::post('cat/edit', [CatigoryController::class, 'edit']);
    Route::post('/cat/destroy', [CatigoryController::class, 'destroy']);
    
    
    
    
    
    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    
});
// Item ...............................  check



    
    Route::post('/item/insert', [ItemController::class, 'store']);
    Route::post('/item/edit', [ItemController::class, 'edit']);
    Route::post('/item/destroy', [ItemController::class, 'destroy']);


    Route::post('/reviews', [ReviewsController::class, 'store']);
    Route::post('/new/reviews', [ReviewsController::class, 'store_new']);
    Route::post('/review/destroy', [ReviewsController::class, 'destroy']);
    Route::post('/review/destroy/pic', [ReviewsController::class, 'destroy_pic']);
    Route::post('/review/fvrt', [ReviewsController::class, 'fvrt']);
    Route::post('/review/edit', [ReviewsController::class, 'edit']);


Route::post('/vote/fvrt', [HomepageController::class, 'fvrt']);

    
    Route::redirect('/index', '/');
    Route::redirect('/index.html', '/');
    Route::get('/', [HomepageController::class, 'index'])->name('index');





// Our Work Page Front-end ............................... 

Route::get('/Work', [WorkpageController::class, 'index']);
Route::post('/gal/album', [WorkpageController::class, 'album']);


require __DIR__.'/auth.php';
