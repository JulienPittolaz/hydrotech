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

//Route pour l'envoi du formulaire de contact
Route::post('/send/email', 'MailCtrl@sendemail');

Route::get('/', 'Front_office\FrontCtrl@index');

Route::get('admin', function(){
    return redirect('/auth/login');
});

Route::get('/auth/login', 'AuthController@login');
Route::post('/auth/check', 'AuthController@check');

Route::group(['middleware' => 'myAuth'], function () {
    Route::get('/auth/logout', 'AuthController@logout');
});

/*Route::get('/images/{type}/{filename}', function ($type, $filename)
{
    echo 'bla';
    $path = storage_path() . '/' . $type .'/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('image');*/


Route::group(['middleware' => 'myAuth', 'prefix' => '/admin'], function () {
    Route::resource('/prix', 'Back_office\PrixCtrl');
    Route::post('/prix/edit/{id}', 'Back_office\PrixCtrl@update');
    Route::resource('/membre', 'Back_office\MembreCtrl');
    Route::post('/membre/{id}/edit', 'Back_office\MembreCtrl@update');
    Route::resource('/presse', 'Back_office\PresseCtrl');
    Route::post('/presse/{id}/edit', 'Back_office\PresseCtrl@update');
    Route::resource('/sponsor', 'Back_office\SponsorCtrl');
    Route::post('/sponsor/{id}/edit', 'Back_office\SponsorCtrl@update');

    Route::delete('sponsor/{id}', 'Back_office\SponsorCtrl@destroy');

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
    Route::resource('/user', 'Back_office\UserCtrl');
    Route::post('/user/{id}/edit', 'Back_office\UserCtrl@update');


    //*******ASSOCIATIONS*******

    Route::get('/associationedition/{type_ressource}', 'Back_office\EditionAssociationCtrl@index');
    Route::resource('/associationedition/{annee}/{type_ressource}', 'Back_office\EditionAssociationCtrl', ['only' => 'create']);
    Route::post('/associationedition', 'Back_office\EditionAssociationCtrl@store');
    Route::delete('/associationedition/{edition_id}/{type_ressource}/{resource_id}', 'Back_office\EditionAssociationCtrl@destroy');


    Route::resource('/associationsponsor', 'Back_office\CategorieEditionSponsorCtrl');
    Route::get('/associationsponsor/create/{annee}', 'Back_office\CategorieEditionSponsorCtrl@create');
    Route::post('/associationsponsor', 'Back_office\CategorieEditionSponsorCtrl@store');
    Route::delete('associationsponsor/{categorie_id}/{edition_id}/{sponsor_id}', 'Back_office\CategorieEditionSponsorCtrl@destroy');


});

Route::group(['prefix' => '/api/v1'], function () {
    //PUBLIC ROUTES
    Route::resource('/membres', 'MembreCtrl', ['only' => ['index', 'show']]);
    Route::resource('/actus', 'ActualiteCtrl', ['only' => ['index', 'show']]);
    Route::resource('/categories', 'CategorieCtrl', ['only' => ['index', 'show']]);
    Route::resource('/editions', 'EditionCtrl', ['only' => ['index', 'show']]);
    Route::resource('/medias', 'MediaCtrl', ['only' => ['index', 'show']]);
    Route::resource('/presses', 'PresseCtrl', ['only' => ['index', 'show']]);
    Route::resource('/prixs', 'PrixCtrl', ['only' => ['index', 'show']]);
    Route::resource('/socials', 'SocialCtrl', ['only' => ['index', 'show']]);
    Route::resource('/sponsors', 'SponsorCtrl', ['only' => ['index', 'show']]);
    Route::resource('/users', 'UserCtrl', ['only' => ['index', 'show']]);
});
