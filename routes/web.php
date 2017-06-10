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
    //return view('Back_office.prixCtrl@index');
});

Route::get('/auth/login', 'AuthController@login');
Route::post('/auth/check', 'AuthController@check');

Route::group(['middleware' => 'myAuth'], function () {
    Route::get('/auth/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'myAuth', 'prefix' => '/admin'], function () {
    Route::resource('/prix', 'Back_office\PrixCtrl');
    Route::post('/prix/edit/{id}', 'Back_office\PrixCtrl@update');
    Route::resource('/membre', 'Back_office\MembreCtrl');
    Route::post('/membre/{id}/edit', 'Back_office\MembreCtrl@update');
    Route::resource('/presse', 'Back_office\PresseCtrl');
    Route::post('/presse/{id}/edit', 'Back_office\PresseCtrl@update');
    Route::resource('/sponsor', 'Back_office\SponsorCtrl');
    Route::post('/sponsor/{id}/edit', 'Back_office\SponsorCtrl@update');
    Route::resource('/categorie', 'Back_office\CategorieCtrl');
    Route::post('/categorie/{id}/edit', 'Back_office\CategorieCtrl@update');
    Route::resource('/media', 'Back_office\MediaCtrl');
    Route::post('/media/{id}/edit', 'Back_office\MediaCtrl@update');
    Route::resource('/actualite', 'Back_office\ActualiteCtrl');
    Route::post('/actualite/{id}/edit', 'Back_office\ActualiteCtrl@update');
    Route::resource('/social', 'Back_office\SocialCtrl');
    Route::post('/social/{id}/edit', 'Back_office\SocialCtrl@update');
    Route::resource('/edition', 'Back_office\EditionCtrl');
    Route::post('/edition/{id}/edit', 'Back_office\EditionCtrl@update');


    //*******ASSOCIATIONS*******

    Route::get('/editions/{type_ressource}', 'Back_office\EditionAssociationCtrl@index');
    Route::post('/editions/{edition_id}/{type_ressource}/{resource_id}', 'EditionAssociationCtrl@store');
});

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
    Route::group([], function () {
        //Route::post('/editions/{edition_id}/{type_ressource}/{resource_id}', 'EditionAssociationCtrl@store');
        Route::post('/editions/{edition_id}/Membre/{membre_id}/{role}', 'EditionMembreAssociationCtrl@store');
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