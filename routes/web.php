<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProduitsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category',CategoriesController::class)->middleware('auth');

Route::get('/CatFind', [CategoriesController::class, 'find'])->name('CatFind');

Route::get('/CatSearch', [CategoriesController::class, 'search'])->name('CatSearch');

//Route::get('category/{key?}',[CategoriesController::class, 'find'])->middleware('auth');


Route::resource('product',ProduitsController::class)->middleware('auth');
