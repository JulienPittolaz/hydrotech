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

Route::get('/auth/login', 'AuthController@login');
Route::post('/auth/check', 'AuthController@check');

Route::group(['middleware' => 'myAuth'], function () {
    Route::get('/auth/logout', 'AuthController@logout');
});

Route::resource('/membres', 'Back_office\MembreCtrl');

Route::group(['prefix' => '/api/v1'], function () {
    //PUBLIC ROUTES
    Route::resource('/membres', 'MembreCtrl', ['only' => ['index', 'show']]);
    Route::resource('/actualites', 'ActualiteCtrl', ['only' => ['index', 'show']]);
    Route::resource('/categories', 'CategorieCtrl', ['only' => ['index', 'show']]);
    Route::resource('/editions', 'EditionCtrl', ['only' => ['index', 'show']]);
    Route::resource('/medias', 'MediaCtrl', ['only' => ['index', 'show']]);
    Route::resource('/presses', 'PresseCtrl', ['only' => ['index', 'show']]);
    Route::resource('/prixs', 'PrixCtrl', ['only' => ['index', 'show']]);
    Route::resource('/socials', 'SocialCtrl', ['only' => ['index', 'show']]);
    Route::resource('/sponsors', 'SponsorCtrl', ['only' => ['index', 'show']]);
    Route::resource('/users', 'UserCtrl', ['only' => ['index', 'show']]);

    //AUTH ROUTES
    Route::group(['middleware' => "myAuth"], function () {
        Route::post('/editions/{edition_id}/{type_ressource}/{resource_id}', 'EditionAssociationCtrl@store');
        Route::post('/sponsors/{categorie_id}/{edition_id}/{sponsor_id}', 'CategorieEditionSponsorCtrl@store');
        Route::delete('/editions/{edition_id}/{type_ressource}/{resource_id}', 'EditionAssociationCtrl@destroy');
        Route::delete('/sponsors/{categorie_id}/{edition_id}/{sponsor_id}', 'CategorieEditionSponsorCtrl@destroy');
        Route::resource('/membres', 'MembreCtrl');
        Route::resource('/actualites', 'ActualiteCtrl');
        Route::resource('/categories', 'CategorieCtrl');
        Route::resource('/editions', 'EditionCtrl');
        Route::resource('/medias', 'MediaCtrl');
        Route::resource('/presses', 'PresseCtrl');
        Route::resource('/prixs', 'PrixCtrl');
        Route::resource('/socials', 'SocialCtrl');
        Route::resource('/sponsors', 'SponsorCtrl');
        Route::resource('/users', 'UserCtrl');
    });
});