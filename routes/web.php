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

Route::group(['prefix' => '/api/v1'], function () {
    Route::post('/editions/{edition_id}/{type_ressource}/{resource_id}', 'EditionAssociationCtrl@store');
    Route::post('/editions/{categorie_id}/{edition_id}/{sponsor_id}', 'CategorieEditionSponsorCtrl@store');
    Route::delete('/editions/{edition_id}/{type_ressource}/{resource_id}', 'EditionAssociationCtrl@destroy');
    Route::delete('/editions/{categorie_id}/{edition_id}/{sponsor_id}', 'CategorieEditionSponsorCtrl@destroy');
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