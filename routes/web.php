<?php

use Illuminate\Support\Facades\Route;
//frontend
use App\Http\Controllers\frontend\ProdukController as FrontProdukController;
use App\Http\Controllers\frontend\KategoriController as FrontKategoriController;
use App\Http\Controllers\frontend\BerandaController as FrontBerandaController;


// Route::get('/', function () { 
//     // return view('welcome'); 
//     return redirect()->route('v1.backend.login'); 
// }); 

Route::get('/', function () { 
    // return view('welcome'); 
    return redirect()->route('beranda.index'); 
}); 

// Frontend 
Route::get('/beranda', [FrontBerandaController::class, 'index'])->name('beranda.index');
Route::get('/produk', [FrontProdukController::class, 'index'])->name('produk.index');
//Route::get('/kategori', [FrontKategoriController::class, 'index'])->name('kategori.index');

Route::get('/produk/{id}', [FrontProdukController::class, 'show'])->name('produk.show');
// Route::get('/kategori/{id}', [FrontKatgoriControler::class, 'show'])->name('kategori.show');


// Backend
// Route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login'); 
// Route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login'); 
// Route::post('backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');

Route::prefix('v1')->name('v1.')->group(function () {

    Route::prefix('backend')->name('backend.')->group(function () {

        Route::controller(App\Http\Controllers\backend\LoginController::class)->group(function () {

            Route::get('login', 'loginBackend')->name('login');
            Route::post('login', 'authenticateBackend')->name('login.process');
            Route::post('logout', 'logoutBackend')->name('logout');

        });

    });

});
//MASTER DATA 
    //Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda')->middleware('auth');      
    // Route::resource('backend/user', UserController::class, ['as' => 'backend'])->middleware('auth');
    // Route::resource('backend/kategori', KategoriController::class, ['as' => 'backend'])->middleware('auth'); 
    // Route::resource('backend/produk', ProdukController::class, ['as' => 'backend'])->middleware('auth');
Route::prefix('v1')->name('v1.')->middleware('auth')->group(function(){
Route::prefix('backend')->name('backend.')->group(function() {
    //Beranda
    Route::prefix('beranda')->name('beranda.')->controller(App\Http\Controllers\backend\BerandaController::class)->group(function(){
        Route::get('/', 'berandaBackend')->name('index');
    });
    //user
    Route::prefix('user')->name('user.')->controller(App\Http\Controllers\backend\UserController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('laporan/user')->name('laporan.user.')->controller(UserController::class)->group(function () {
            Route::get('/form', 'formUser')->name('form');
            Route::post('/cetak', 'cetakUser')->name('cetak');
        });
    //kategori
    Route::prefix('kategori')->name('kategori.')->controller(App\Http\Controllers\backend\KategoriController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    //produk
    Route::prefix('produk')->name('produk.')->controller(App\Http\Controllers\backend\ProdukController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('laporan/produk')->name('laporan.produk.')->controller(ProdukController::class)->group(function () {
            Route::get('/form', 'formProduk')->name('form');
            Route::post('/cetak', 'cetakProduk')->name('cetak');
        });
    
        
        //Route::post('backend/laporan/cetakuser', [UserController::class, 'cetakUser'])->name('backend.laporan.cetakuser')->middleware('auth'); 
        //Route::get('backend/laporan/formproduk', [ProdukController::class, 'formProduk'])->name('backend.laporan.formproduk')->middleware('auth'); 
        //Route::post('backend/laporan/cetakproduk', [ProdukController::class, 'cetakProduk'])->name('backend.laporan.cetakproduk')->middleware('auth'); 

});
});



//storage
//Route::resource('backend/foto-produk', FotoProdukController::class, ['as' => 'backend'])->middleware('auth');
//Route::delete('backend/foto-produk/{id}', [ProdukController::class, 'destroyFoto'])->name('backend.foto-produk.destroy')->middleware('auth');
//Route::post('backend/foto-produk',[ProdukController::class, 'storeFoto'])->name('backend.foto-produk.store')->middleware('auth');

//Route::get('backend/laporan/formuser', [UserController::class, 'formUser'])->name('backend.laporan.formuser')->middleware('auth'); 
//Route::post('backend/laporan/cetakuser', [UserController::class, 'cetakUser'])->name('backend.laporan.cetakuser')->middleware('auth'); 
//Route::get('backend/laporan/formproduk', [ProdukController::class, 'formProduk'])->name('backend.laporan.formproduk')->middleware('auth'); 
//Route::post('backend/laporan/cetakproduk', [ProdukController::class, 'cetakProduk'])->name('backend.laporan.cetakproduk')->middleware('auth'); 
