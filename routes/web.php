<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Models\User;
use App\Models\Brand;
use App\Models\Multipic;
use App\Models\HomeAbout;
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
    $brands = Brand::all();
    $abouts = HomeAbout::first();
    $images = Multipic::all();
    // dd(collection($brands));
    return view('home',compact('brands','abouts','images'));
})->name('home');

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




//Contact Controller
Route::get('/admin/contact',[ContactController::class, 'AdminContact'])->name('all.contact');
Route::get('/contact/create',[ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/store/contact',[ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}',[ContactController::class, 'Edit'])->name('contactedit');
Route::post('/contact/update/{id}',[ContactController::class, 'Update'])->name('contactupdate');
Route::get('/contact/delete/{id}',[ContactController::class, 'delete'])->name('contactdelete');
Route::get('/contact/message',[ContactController::class, 'AdminMessage'])->name('all.message');
Route::get('/contact/delete/{id}',[ContactController::class, 'DeleteMessage'])->name('messagedelete');


// contact form
Route::get('/contact',[ContactController::class,'Contact'])->name('contact');
Route::post('/contact/form',[ContactController::class,'ContactForm'])->name('contact.form');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
    $users = DB::table('users')->get();
    return view('admin.index',compact('users'));
})->name('dashboard');

Route::get('/user/logout',[BrandController::class, 'Logout'])->name('user.logout');


//Slider
Route::get('/home/slider',[HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/home/delete/{id}',[HomeController::class, 'Delete'])->name('sliderdelete');
Route::get('/home/edit/{id}',[HomeController::class, 'Edit'])->name('slideredit');





//HomeAbout
Route::get('/home/about',[AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about',[AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about',[AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[AboutController::class, 'Edit'])->name('aboutedit');
Route::post('/store/update/{id}',[AboutController::class, 'Update'])->name('update.about');
Route::get('/about/delete/{id}',[AboutController::class, 'Delete'])->name('aboutdelete');

//Portofolio route
Route::get('/portofolio',[AboutController::class, 'Portofolio'])->name('portofolio');
 






Route::get('/user/password',[ChangePass::class,'ChangePassword'])->name('change.password');
Route::post('/password/update',[ChangePass::class,'PasswordUpdate'])->name('password.update');




Route::get('/user/profile',[ChangePass::class,'ProfileEdit'])->name('profile.edit');
Route::POST('/user/profile/update',[ChangePass::class,'ProfileUpdate'])->name('profile.update');
