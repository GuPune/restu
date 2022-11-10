<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExportHtmlNewController;
use App\Http\Controllers\MultiController;
use App\Http\Controllers\FrontNewController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ToeController;
use App\Http\Controllers\ZoneController;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


// Route::get('/lang/{locale}', [FrontNewController::class, 'lang'])->name('new.lang');
// Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm']);
// Route::post('/login', [LoginController::class,'login'])->name('login');
// Route::get('/new', [FrontNewController::class, 'index'])->name('new');
// Route::get('/new/{id}', [FrontNewController::class, 'show'])->name('new.show');
// Route::get('/product', [FrontProductController::class, 'index'])->name('product');
// Route::get('/product/{id}', [FrontProductController::class, 'show'])->name('product.show');
// Route::get('/bussines', [FrontBussinessController::class, 'index'])->name('bussines');

// Route::prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function () {
//     //
//     Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
//     Route::get('/logout', [App\Http\Controllers\HomeController::class, 'perform'])->name('logout.perform');
// });


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/logout', [HomeController::class, 'perform'])->name('logout.perform');

    Route::resource('new', '\App\Http\Controllers\NewController');
    Route::resource('product', '\App\Http\Controllers\ProductController');
    Route::resource('bussines', '\App\Http\Controllers\BussinesController');
    Route::resource('contact', '\App\Http\Controllers\ContactController');

    Route::resource('new-setting', '\App\Http\Controllers\NewSettingController');
    Route::resource('product-setting', '\App\Http\Controllers\ProductSettingController');
    Route::resource('bussines-setting', '\App\Http\Controllers\BussinesSettingController');

    Route::resource('logoweb', '\App\Http\Controllers\LogowebController');
    Route::resource('logoslide', '\App\Http\Controllers\ImageslideController');
    Route::resource('logobrand', '\App\Http\Controllers\LogobrandController');
    Route::resource('logoabout', '\App\Http\Controllers\ImageslideaboutController');
    Route::resource('logocustomer', '\App\Http\Controllers\LogocustomerController');
    Route::resource('logocer', '\App\Http\Controllers\LogocerController');
    Route::resource('logobussines', '\App\Http\Controllers\LogobussinesController');

    Route::resource('bu', '\App\Http\Controllers\BuController');


    Route::resource('title', '\App\Http\Controllers\ChagnetitleController');

    // Route::post('/product/uploadimage', [App\Http\Controllers\ProductController::class, 'upload']);


    // Route::get('/mutli/{id}', [MultiController::class, 'index'])->name('dashboard');
    // Route::PUT('/mutli/{id}', [MultiController::class, 'update'])->name('dashboard');
    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);

    Route::resource('toe', ToeController::class);

    Route::post('toe/datatables', [\App\Http\Controllers\ToeController::class, 'getDatatable'])->name('toeitem.data');
    Route::post('toe/close', [\App\Http\Controllers\ToeController::class, 'Close']);
    Route::post('toe/open', [\App\Http\Controllers\ToeController::class, 'Open']);

    Route::resource('zone', ZoneController::class);
    Route::post('zone/datatables', [\App\Http\Controllers\ZoneController::class, 'getDatatable'])->name('zoneitem.data');
    Route::post('zone/close', [\App\Http\Controllers\ZoneController::class, 'Close']);
    Route::post('zone/open', [\App\Http\Controllers\ZoneController::class, 'Open']);
});


Route::post('uploadx', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('uploadx');

Route::get('/export/new/{id}', [ExportHtmlNewController::class, 'index'])->name('dashboard');


Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
