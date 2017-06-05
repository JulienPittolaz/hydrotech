<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MediaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all()->where('actif', true);
        foreach ($medias as $media){
            $media->url = urldecode($media->url);
        }
        return $medias;
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
        $para = $request->only(['url', 'titre', 'date', 'auteur', 'typeMedia']);
        if (!Media::isValid($para)) {
            return response()->json('Media non valide', Response::HTTP_BAD_REQUEST);
        }
        $para['url'] = urlencode($para['url']);
        $media = new Media($para);
        $media->save();
        $media->url = urldecode($media->url);
        return response()->json($media, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::find($id);
        if (!Media::isValid(['id' => $id]) || $media->actif == false) {
            return response()->json('Media non valide', Response::HTTP_BAD_REQUEST);
        }
        if (Media::find($id) == null) {
            return response()->json('Media introuvable', Response::HTTP_NOT_FOUND);
        }
        $media->url = urldecode($media->url);
        return $media;
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
        $media = Media::find($id);
        $para = $request->intersect(['url', 'titre', 'date', 'auteur', 'typeMedia']);
        if (!Media::isValid($para)) {
            return response()->json('Media non valide', Response::HTTP_BAD_REQUEST);
        }
        if (!Media::isValid(['id' => $id]) || $media->actif == false) {
            return response()->json('Media inexistant', Response::HTTP_NOT_FOUND);
        }
        if($request->has('url')){
            $para['url'] = urlencode($para['url']);
        }
        $media->update($para);
        $media->url = urldecode($media->url);
        return response()->json($media, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::find($id);

        if (!Media::isValid(['id' => $id])) {
            return response()->json('Media non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($media == null) {
            return response()->json('Media introuvable', Response::HTTP_NOT_FOUND);
        }
        if($media['actif'] == false){
            return response()->json('Media déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        $media->actif = false;
        $media->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
