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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes(['register' => false]);

//Routes ressources pour la gestion star au backoffice,
//avec une exception sur la route "show" que nous n'utiliserons pas
//une exception sur la route "delete" qui nécessite l'utilisation de la méthode DELETE.
Route::resource('star', 'StarController')->except(['index', 'show', 'delete'])->middleware('auth', 'isAdmin');

//Intégration d'une route pour la suppression d'une star via GET.
Route::get('star/{id}/delete', 'StarController@destroy')->middleware('auth', 'isAdmin');

//Ajout de la route index pour StarController
Route::get('/', 'StarController@index')->name('index');

//Route pour la page de backOffice
Route::get('backoffice', function(){
    return view('stars.backoffice');
})->name('backoffice')->middleware('auth', 'isAdmin');

//Route pour la gestion des stars accessible depuis le backoffice
//Tableau reprenant la liste des stars pour proposer la modification/suppression
Route::get('star/gestion', 'StarController@gestion')->name('gestion')->middleware('auth', 'isAdmin');

//Route::get('/home', 'HomeController@index')->name('home');
