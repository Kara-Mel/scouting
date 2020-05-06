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

Route::get('/', 'Clan@index');
Route::get('clan/{id}', 'Player@index');
Route::get('clan/player/{id}', 'Decks@index');

Route::resource('decks', 'Decks', ['except' => ['index', 'create', 'edit']]);
//Route::get('decks', 'Decks','Decks@increment');
Route::get('clan/player/{id}/create', 'Decks@create');
Route::get('clan/player/{id}/edit', 'Decks@edit');


