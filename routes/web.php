<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\OLController;
use App\Http\Controllers\CreaListaController;
use App\Http\Controllers\GutenbergController;
use App\Http\Controllers\FaqController;


// Route::get('/', function () {
//     return view('welcome');
// });
// Home route
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// GUTENBERG
Route::get('/gutenberg', [GutenbergController::class, 'gutenberg'])->name('gutenberg');
Route::get('/gutenberg/search', [GutenbergController::class, 'search'])->name('gutenberg.search');



// Authentication routes
Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@do_login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');


Route::get('/register', 'App\Http\Controllers\LoginController@signup')->name('register');
Route::post('/register', 'App\Http\Controllers\LoginController@do_signup');

Route::get('signup/check/{field}', 'App\Http\Controllers\LoginController@check');

Route::get('/random-quote', [QuoteController::class, 'getRandomQuote']);


Route::get('/titoli-libri', [HomeController::class, 'getTitoliLibri']);
// Route::get('/drop-titoli-libri', [HomeController::class, 'dropTitoliLibriRecords']);

Route::get('/faq', [FaqController::class, 'index']);



// Spotify


Route::get('/spotify', 'App\Http\Controllers\SpotifyController@index')->name('spotify');;

Route::post('/getPlaylist', [SpotifyController::class, 'getPlaylist']);
Route::post('/prendiCronologia', [SpotifyController::class, 'prendiCronologia']);
Route::post('/addCronologia', [SpotifyController::class, 'addCronologia']);
Route::get('/deleteCronologia', [SpotifyController::class, 'deleteCronologia']);


// Route::post('/caricaLaCronologia', 'App\Http\Controllers\SpotifyController@caricaLaCronologia');
// // Route::get('caricaLaCronologia', 'App\Http\Controllers\SpotifyController@caricaLaCronologia');
// Route::get('/eliminaLaCronologia', 'App\Http\Controllers\SpotifyController@eliminaLaCronologia');
// Route::post('/getPlaylistAggiungiCronologia', 'App\Http\Controllers\SpotifyController@getPlaylistAggiungiCronologia');


//OPEN LIBRARY PAGES

Route::get('/OL_search', [OLController::class, 'index'])->name('page_ricerca_OL');
Route::get('/ricercaOL', [OLController::class, 'ricercaOL']);

Route::post('/add-save-book', [OLController::class, 'addSaveBook']);
Route::post('/delete-save-book', [OLController::class, 'deleteSaveBook']);
Route::get('/select-save-book', [OLController::class, 'selectSaveBook']);

Route::get('/OL_salvati', [OLController::class, 'indexSave'])->name('page_OL_salvati');


// CREA LISTA

Route::get('/crea-lista', [CreaListaController::class, 'index'])->name('creaLista');

Route::get('/get-titoli-libri', [CreaListaController::class, 'getTitoliLibri']);
Route::post('/query-lista-libri', [CreaListaController::class, 'queryListaLibri']);
Route::post('/gestione-lista-libri', [CreaListaController::class, 'gestioneListaLibri']);
Route::get('/load-liste', [CreaListaController::class, 'loadListe']);
Route::get('/view-valori-lista', [CreaListaController::class, 'viewValoriLista']);