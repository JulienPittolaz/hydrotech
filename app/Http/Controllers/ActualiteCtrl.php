<?php

namespace App\Http\Controllers;

use App\Actualite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class ActualiteCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actualites = Actualite::all()->where('actif', true);
        foreach ($actualites as $actualite) {
            $actualite->urlImage = urldecode($actualite->urlImage);
        }
        return $actualites;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only(['titre', 'datePublication', 'contenu', 'publie', 'urlImage']);
        if (!Actualite::isValid($inputs)) {
            return response()->json('Actualité invalide', Response::HTTP_BAD_REQUEST);
        }

        $actualite = new Actualite([
            'titre' => $inputs['titre'],
            'datePublication' => $inputs['datePublication'],
            'contenu' => $inputs['contenu'],
            'urlImage' => urlencode($inputs['urlImage']),
            'auteur' => 'UTILISATEUR TEST',
            //'auteur' => Auth::user()->name,
            'publie' => $inputs['publie']
        ]);
        $actualite->save();
        $actualite['urlImage'] = urldecode($actualite['urlImage']);
        return  response()->json($actualite, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $actualite = Actualite::find($id);

        if (!Actualite::isValid(['id' => $id]) || $actualite->actif == false) {
            return response()->json('Requête invalide', Response::HTTP_NOT_FOUND);
        }
        return $actualite;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actualite = Actualite::find($id);

        $inputs = $request->intersect(['titre', 'datePublication', 'contenu', 'publie', 'urlImage']);
        if (!Actualite::isValid($inputs)) {
            return response()->json('Requête invalide', Response::HTTP_BAD_REQUEST);
        }

        if (!Actualite::isValid(['id' => $id])) {
            return response()->json('Not found', Response::HTTP_NOT_FOUND);
        }

        if($actualite['actif'] == false){
            return response()->json('Actualité déjà supprimé', Response::HTTP_NOT_FOUND);
        }

        if($request->has('urlImage')) {
            $inputs['urlImage'] = urlencode($inputs['urlImage']);
        }
        $actualite->update($inputs);
        $actualite['urlImage'] = urldecode($actualite['urlImage']);
        return  response()->json($actualite, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actualite = Actualite::find($id);

        if (!Actualite::isValid(['id' => $id])) {
            return response()->json('Requête invalide', Response::HTTP_BAD_REQUEST);
        }

        if($actualite['actif'] == false){
            return response()->json('Actualité déjà supprimée', Response::HTTP_NOT_FOUND);
        }
        $actualite->actif = false;
        $actualite->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
