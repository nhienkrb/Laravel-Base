<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController ;
use App\Http\Controllers\FoodController ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'detail'])->where([
    'id' => '[0-9]+',
    // 'productName' => '[a-zA-Z]+'
])->name('product-detail');
Route::get('/page',[PageController::class,'index'])->name('page');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/post',[PostController::class,'index'])->name('post');
Route::resource('/food', FoodController::class);

Route::get('/home',function(){
    return view('home');
});
 
Route::get('/user',function(){
    return "Hello User";
});

Route::get('/info',function(){
    return response()->json([
        'name' => 'John Doe',
        'age' => 25,
        'email' => 'bcy@gmail.com']);
});

Route::get('redirect',function(){
    return redirect('/user');
});
Route::get('/env',function(){
    return env('APP_NAME');
});
