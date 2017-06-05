<?php

namespace App\Http\Controllers;

use App\Presse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PresseCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presses = Presse::all()->where('actif', true);
        foreach ($presses as $press){
            $press->url = urldecode($press->url);
        }
        return $presses;
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
        $para = $request->only(['url', 'titreArticle', 'description', 'dateParution', 'nomPresse']);
        if (!Presse::isValid($para)) {
            return response()->json('Presse non valide', Response::HTTP_BAD_REQUEST);

        }
        $para['url'] = urlencode($para['url']);
        $presse = new Presse($para);
        $presse->save();
        $presse->url = urldecode($presse->url);
        return response()->json($presse, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presse = Presse::find($id);
        if (!Presse::isValid(['id' => $id]) || $presse->actif == false) {
            return response()->json('Presse non valide', Response::HTTP_BAD_REQUEST);
        }
        if (Presse::find($id) == null) {
            return response()->json('Presse introuvable', Response::HTTP_NOT_FOUND);
        }
        $presse->url = urldecode($presse->url);
        return $presse;
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
        $presse = Presse::find($id);
        $para = $request->intersect(['url', 'titreArticle', 'description', 'dateParution', 'nomPresse']);
        if (!Presse::isValid($para)) {
            return response()->json('Presse non valide', Response::HTTP_BAD_REQUEST);
        }
        if (!Presse::isValid(['id' => $id]) || $presse->actif == false) {
            return response()->json('Presse inexistant', Response::HTTP_NOT_FOUND);
        }
        if($request->has('url')){
            $para['url'] = urlencode($para['url']);
        }
        $presse->update($para);
        $presse->url = urldecode($presse->url);
        return response()->json($presse, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presse = Presse::find($id);

        if (!Presse::isValid(['id' => $id])) {
            return response()->json('Presse non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($presse == null) {
            return response()->json('Presse introuvable', Response::HTTP_NOT_FOUND);
        }
        if($presse['actif'] == false){
            return response()->json('Presse déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        $presse->actif = false;
        $presse->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
