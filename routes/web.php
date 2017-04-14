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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('dashboard');
    Route::get('addCharacter', 'HomeController@addCharacter')->name('dashboard.addcharacter');

    Route::resource('messages', 'MessageController');

    Route::get('group/own', 'GroupController@own')->name('group.own');
    Route::resource('group', 'GroupController');

    Route::resource('characters', 'CharacterController');
    Route::resource('vehicles', 'VehicleController');



    Route::group(['prefix' => 'action', 'middleware' => 'auth'], function () {
        Route::get('raid', 'Actions\RaidActionController@setup')->name('action.raid');
        Route::post('raid', 'Actions\RaidActionController@enact')->name('action.raid.enact');
    });

});
