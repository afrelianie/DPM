<?php

use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;
use App\Imports\PemilikImport;
use App\Imports\UmkmImport;
use Maatwebsite\Excel\Facades\Excel;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\PemilikController;


// Route::get('/', function () {
//     return view('welcome');
// });

            ///////////  WEB /////////////
// Route::resource('/', WebController::class);
Route::get('/', [WebController::class, 'welcome'])->name('/');
Route::get('kecamatan/{id_kecamatan}', [WebController::class, 'kecamatan']);
Route::get('category/{id_category}', [WebController::class, 'category']);
Route::get('umkm/detail/{id_umkm}', [WebController::class, 'detail']);
Route::get('search', [WebController::class, 'search']);
// Route::post('search/list', [WebController::class, 'list']);
// Route::get('404', [WebController::class, 'notfound'])->name('404');




			///////////  AUTH /////////////
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('proses_login',[AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function (){
    // Route::group(['middleware' => ['cek_login:admin']], function() {
        Route::get('admin', [AdminController::class, 'home'])->name('admin');
        Route::get('beranda', [AdminController::class, 'index'])->name('beranda');

    // });
});

            ///////////  ADMIN /////////////
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('pemilik', PemilikController::class);
    Route::resource('umkm', UmkmController::class);
    Route::post('pemilik/import', [PemilikController::class, '__invoke']);

});

            ///////////  UMKM /////////////
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('umkm', [UmkmController::class, 'index'])->name('umkm');
    Route::get('umkm/create', [UmkmController::class, 'create']);
    Route::post('umkm/store', [UmkmController::class, 'store']);
    Route::get('umkm/edit/{id_umkm}', [UmkmController::class, 'edit']);
    Route::post('umkm/update/{id_umkm}', [UmkmController::class, 'update']);
    Route::post('umkm/delete/{id_umkm}', [UmkmController::class, 'delete']);
    Route::get('umkm/show/{id_umkm}', [UmkmController::class, 'show']);
    Route::post('umkm/import', [UmkmController::class, '__invoke']);


});



            ///////////  KECAMATAN /////////////
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
    Route::post('kecamatan/store', [KecamatanController::class, 'store']);
    Route::post('kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
    Route::post('kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete']);
    Route::get('kecamatan/show/{id_kecamatan}', [KecamatanController::class, 'show']);

});



            ///////////  CATEGORY MAPS /////////////
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('category/store', [CategoryController::class, 'store']);
    Route::post('category/update/{id_category}', [CategoryController::class, 'update']);
    Route::post('category/delete/{id_category}', [CategoryController::class, 'delete']);
    Route::get('category/show/{id_category}', [CategoryController::class, 'show']);

});


//         ///////////  KEPEMILIKAN UMKM /////////////
// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::get('pemilik', [PemilikController::class, 'index'])->name('pemilik');
//     Route::get('pemilik/create', [PemilikController::class, 'create']);
//     Route::post('pemilik/store', [PemilikController::class, 'store']);
//     Route::post('pemilik/update/{id}', [PemilikController::class, 'update']);
//     Route::post('pemilik/destroy/{id}', [PemilikController::class, 'destroy']);
//     Route::get('pemilik/show/{id}', [PemilikController::class, 'show']);

// });

