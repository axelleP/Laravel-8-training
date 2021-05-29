<?php

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

use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'showList']);
Route::get('/articles/liste', [ArticleController::class, 'showList']);

//affiche le formulaire
Route::get('/articles/formulaire', [ArticleController::class, 'showForm']);
//soumet le formulaire
Route::post('/articles/formulaire', [ArticleController::class, 'create']);