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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reservation','HomeController@reservation');


Route::post('/Envoi','resrvationController@sendEmailReminder');
Route::post('/save','resrvationController@store');



//Route::any('(.*)', function ($req){dd($req);});
//Route::post('', function (){ return 'erreur'; } );

Route::get('/reservation','resrvationController@afficherT');
Route::post('/delete/{id}','resrvationController@delete');

//Route::post('/pdf_gene','resrvationController@FichierDyna');

Route::post('/download','PdfController@PDFD');

//Route::post('/download','resrvationController@PDF');


