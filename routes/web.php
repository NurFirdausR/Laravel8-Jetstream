<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Models\User;
use Illuminate\Support\Facades\DB;


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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "this is home page";
});

Route::get('/about', function () {
   return view('about');
});

Route::get('/contact-s-dw-dw-d-wd-wd-w-d-w',[ContactController::class, 'index'])->name('nur');
Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class, 'Edit'])->name('categoryedit');
Route::post('/category/update/{id}',[CategoryController::class, 'Update'])->name('categoryupdate');
Route::get('/category/delete/{id}',[CategoryController::class, 'softDelete'])->name('categorysoftdelete');
Route::get('/category/restore/{id}',[CategoryController::class, 'Restore'])->name('categoryrestore');
Route::get('/category/pdelete/{id}',[CategoryController::class, 'pDelete'])->name('categorypdelete');

//for brand route
Route::get('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class, 'Edit'])->name('brandedit');
Route::post('/brand/update/{id}',[BrandController::class, 'Update'])->name('brandupdate');
Route::get('/brand/delete/{id}',[BrandController::class, 'Delete'])->name('branddelete');

// for multi image
Route::get('/multi/image',[BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add',[BrandController::class, 'StoreImg'])->name('store.image');




Route::get('/exportcategory',[CategoryController::class, 'categoryExport'])->name('exportCategory');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
    $users = DB::table('users')->get();
    return view('admin.index',compact('users'));
})->name('dashboard');

Route::get('/user/logout',[BrandController::class, 'Logout'])->name('user.logout');
Route::get('/user/black',[BrandController::class, 'black'])->name('user.black');
 

