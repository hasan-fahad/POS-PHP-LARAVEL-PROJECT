<?php


use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersGroupController;
use App\Http\Controllers\UsersController;

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



Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class,'authenticate'])->name('login.confirm');


Route::group(['middleware' => 'auth'], function() {
	
	Route::get('dashboard', function () {
	    return view('welcome');
	});

	Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::get('users',function(){
    return view('users/users');
});
Route::get('groups',function(){
    return view('groups/groups');
});

Route::get('categories',function(){
    return view('categories/categories');
});

Route::get('products',function(){
    return view('products/products');
});

// USERS GROUP CONTROLLER SECTION

Route::get('groups',[UsersGroupController::class,'index']);
Route::get('groups/create',[UsersGroupController::class,'create']);
Route::post('groups',[UsersGroupController::class,'store']);
Route::delete('groups/{id}',[UsersGroupController::class,'destroy']);

// USERS CONTROLLER SECTION
Route::resource('users',UsersController::class);
// Route::get('users',[UsersController::class,'index']);
// Route::get('users/{id}',[UsersController::class,'show']);
// Route::get('users/create',[UsersController::class,'create']);
// Route::post('users',[UsersController::class,'store']);
// Route::get('users/{id}/edit',[UsersController::class,'edit']);
// Route::put('users/{id}',[UsersController::class,'update']);
// Route::delete('users/{id}',[UsersController::class,'destroy']);

Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductsController::class);
});