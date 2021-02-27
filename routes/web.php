<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExcelController;
// use App\Http\Controllers\PdfController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductInController;
use App\Http\Controllers\ProductOutController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupplierController;

use App\Http\Controllers\PDFController;
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

// pdf download
Route::get('pdf/preview', [PDFController::class, 'preview'])->name('pdf.preview');

Route::get('pdf/generate', [PDFController::class, 'generatePDF'])->name('pdf.generate');

Route::get('product_in/pdf-generate', [PDFController::class, 'generatePDFProduct'])->name('pdf.produk-masuk');

Route::get('product_out/pdf-generate', [PDFController::class, 'generatePDFProductKeluar'])->name('pdf.produk-keluar');

// excel export

Route::get('product_in/excel-generate', [ExcelController::class, 'exportProdukMasuk'])->name('excle.produk-masuk');
Route::get('product_out/excel-generate', [ExcelController::class, 'exportProdukKeluar'])->name('excle.produk-keluar');



Route::get('/products/pdf', [ProductController::class, 'createPdfProduct'])->name('pdf-product');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return redirect()->route('dashboard');
});

// Route::get('/admin', function () {
//     return redirect()->route('dashboard');
// });

Route::group(['middleware' => 'auth'], function () {

    // Route::view('home', 'home')->name('home');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('/users', UserController::class, ['as' => 'admin']);

    Route::resource(
        '/products',
        ProductController::class,
        ['except' => ['show'], 'as' => 'admin']
    );
    Route::resource(
        '/category',
        CategoryController::class,
        ['as' => 'admin']
    );
    Route::resource(
        '/customers',
        CustomerController::class,
        ['as' => 'admin']
    );
    Route::resource(
        '/sales',
        SalesController::class,
        ['as' => 'admin']
    );

    Route::resource(
        '/product_in',
        ProductInController::class,
        ['as' => 'admin']
    );

    Route::resource(
        '/product_out',
        ProductOutController::class,
        ['as' => 'admin']
    );

    Route::resource('/supplier', SupplierController::class, ['as' => 'admin']);

    Route::get('/permission', [PermissionController::class, 'index'])->name('permission');

    Route::resource('/roles', RoleController::class, ['as' => 'admin']);
});
