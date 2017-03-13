<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\StatesModel;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home','PhonebookController@index');
Route::group(['prefix' => 'api'], function () {
   Route::get('contacts','PhonebookController@getContacts');
   Route::post('contact','PhonebookController@saveContact');
   Route::delete('contact/{id}','PhonebookController@deleteContact');
   Route::get('contact/{id}','PhonebookController@singleContact');
   Route::put('contact/{id}','PhonebookController@updateContact');
});
Route::post('language','PhonebookController@languageChanger');


