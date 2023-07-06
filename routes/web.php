<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\showPaginatedRecordsController;
use Illuminate\Http\Response;


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

Route::get("/login",[AuthController::class,"login"])->middleware("RedirectIfSessionExists");
Route::post("/handleLogin",[AuthController::class,"handleLogin"]);
Route::post("/handleLogout",[AuthController::class,"handleLogout"]);
Route::get("/register",[AuthController::class,"register"]);
Route::resource("/records",DBController::class)->middleware("CheckSession");
Route::get("dashboard/{page?}",[showPaginatedRecordsController::class,'show'])->middleware('CheckSession');


Route::get('/sitemap.xml',[SitemapController::class,'index']);