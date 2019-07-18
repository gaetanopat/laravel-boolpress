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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();       // insieme di rotte per l'autenticazione
// in Auth::route(['register' => false]) per togliere la possibilità di registrarsi oppure in app.blade.php posso commentare
// @if (Route::has('register'))
//     <li class="nav-item">
//         <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
//     </li>
// @endif

// raggruppo le rotte e do un tot di informazioni tutte in una volta
// tutto quello che c'è (riga 23 e 24) ha il middleware auth, quindi devo essere per forza loggato, tutti gli url hanno il prefisso admin (tipo localhost:8000/admin),
// tutte le rotte hanno admin. (tipo admin.posts.index)
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('posts', 'PostController');
});

// middleware('auth') -> significa che per vedere quelle cose devi essere per forza loggato

Route::get('/', 'HomeController@index')->name('home');
Route::get('posts/{slug}', 'PostController@show')->name('posts.show');   // {slug} è quello che andrò in PostController.php del front office come parametro in public show($slug)

Route::get('categories/{slug}', 'PostController@showCategory')->name('categories.show');
