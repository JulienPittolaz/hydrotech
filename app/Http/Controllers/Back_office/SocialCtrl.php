<?php

namespace App\Http\Controllers\Back_office;

use App\Social;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all()->where('actif', true);
        $social_columns = Social::all()->first()['fillable'];

        foreach ($socials as $social){
            $social->url = urldecode($social->url);
        }
        return view('social/index', ['socials' => $socials, 'columns' => $social_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $para = $request->only(['nom', 'url']);
        if (!Social::isValid($para)) {
            return response()->json('Social non valide', Response::HTTP_BAD_REQUEST);
        }
        $para['url'] = urlencode($para['url']);
        $social = new Social($para);
        $social->save();
        $social->url = urldecode($social->url);
        return redirect('admin/social')->withInput()->with('message', 'Nouveau réseau social ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $social = Social::find($id);
        if (!Social::isValid(['id' => $id]) || $social->actif == false) {
            return response()->json('Social non valide', Response::HTTP_BAD_REQUEST);
        }
        if (Social::find($id) == null) {
            return response()->json('Social introuvable', Response::HTTP_NOT_FOUND);
        }
        $social->url = urldecode($social->url);
        return $social;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $social = Social::find($id);
        if (!$social) {
            return redirect('admin/social');
        }
        $social->first();
        $social->url = urldecode($social->url);
        return view('social/edit', ['social' => $social]);
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
        $social = Social::find($id);
        $para = $request->intersect(['url', 'titre', 'date', 'auteur', 'typeSocial']);
        if (!Social::isValid($para)) {
            return response()->json('Social non valide', Response::HTTP_BAD_REQUEST);
        }
        if (!Social::isValid(['id' => $id]) || $social->actif == false) {
            return response()->json('Social inexistant', Response::HTTP_NOT_FOUND);
        }
        if($request->has('url')){
            $para['url'] = urlencode($para['url']);
        }
        $social->update($para);
        $social->url = urldecode($social->url);
        return redirect('admin/presse')->withInput()->with('message', 'Modification enregristrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = Social::find($id);

        if (!Social::isValid(['id' => $id])) {
            return response()->json('Social non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($social == null) {
            return response()->json('Social introuvable', Response::HTTP_NOT_FOUND);
        }
        if($social['actif'] == false){
            return response()->json('Social déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        $social->actif = false;
        $social->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
