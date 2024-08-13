<?php

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
    return view("admin.company.addCompany");
});

//Route::get('/user/login',[\App\Http\Controllers\website\LoginController::class,"login"]);
//Route::post('/user/posts',[\App\Http\Controllers\website\PostController::class,"showPosts"])->name('user_login');

//company
Route::get("/company/add",[\App\Http\Controllers\admin\CompanyController::class,"index"]);
Route::post("/company/view",[\App\Http\Controllers\admin\CompanyController::class,"store"])->name("company_store");
Route::get("/company/view",[\App\Http\Controllers\admin\CompanyController::class,"show"])->name("company_show");
Route::post("/company/del",[\App\Http\Controllers\admin\CompanyController::class,"delCompany"])->name("company_delete");
Route::get("/company/update",[\App\Http\Controllers\admin\CompanyController::class,"getCompany"])->name("company_get");
Route::post("/company/edit",[\App\Http\Controllers\admin\CompanyController::class,"updateCompany"])->name("company_update");
//product
Route::get("/product/add",[\App\Http\Controllers\admin\ProductController::class,"index"]);
Route::post("/product/view",[\App\Http\Controllers\admin\ProductController::class,"store"])->name("product_store");
Route::get("/product/view",[\App\Http\Controllers\admin\ProductController::class,"show"])->name("product_show");
Route::post("/product/del",[\App\Http\Controllers\admin\ProductController::class,"delProduct"])->name("product_delete");
Route::get("/product/update",[\App\Http\Controllers\admin\ProductController::class,"getProduct"])->name("product_get");
Route::post("/product/edit",[\App\Http\Controllers\admin\ProductController::class,"updateProduct"])->name("product_update");
