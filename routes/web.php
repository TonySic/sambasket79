<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AdresseController;
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

Route::get('/', [HomeController::class, 'boutique'])->name('boutique');

Route::get('/boutique', [HomeController::class, 'boutique'])->name('boutique');

Route::get('/politique', [HomeController::class, 'politique'])->name('politique');

Route::resource('/users', UserController::class)->except('index', 'create', 'store');

Route::resource('/adresses', AdresseController::class)->except('index', 'create', 'edit', 'show');

Route::put('/user/modif-password/{user}', [UserController::class, 'updatePassword'])->name('updatePassword');

Route::resource('/articles', ArticleController::class)->except('index', 'create');

// Routes Panier 

Route::get('/panier', [PanierController::class, 'show'])->name('panier');

Route::post('panier/add/{article}', [PanierController::class, 'add'])->name('panier.add');

Route::get('panier/remove/{article}', [PanierController::class, 'remove'])->name('panier.remove');

Route::get('panier/empty', [PanierController::class, 'empty'])->name('panier.empty');