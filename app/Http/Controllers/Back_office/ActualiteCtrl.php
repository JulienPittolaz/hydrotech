<?php

namespace App\Http\Controllers\Back_office;

use App\Actualite;
use App\Edition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

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
        $actualite_columns = Actualite::all()->first()['fillable'];
        return view('actualite/index', ['actualites' => $actualites, 'columns' => $actualite_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actualite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only(['titre', 'datePublication', 'contenu', 'urlImage', 'publie']);
        if (!Actualite::isValid($inputs)) {
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }
        if($inputs['datePublication'] )
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
        return redirect('admin/actualite')->withInput()->with('message', 'Nouvelle actualité créée');
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
        if (Sponsor::find($id) == null) {
            return response()->json('Sponsor introuvable', Response::HTTP_NOT_FOUND);
        }
        $actualite->urlImage = urldecode($actualite->urlImage);
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
        $actualite = Actualite::find($id);
        if (!$actualite) {
            return redirect('admin/actualite');
        }
        $actualite->first();
        $actualite->urlImage = urldecode($actualite->urlImage);
        return view('actualite/edit', ['actualite' => $actualite]);
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
        if($request->has('publie')) {
            if ($inputs['publie'] == 'false') {
                $inputs['publie'] = false;
            }
            if ($inputs['publie'] == 'true') {
                $inputs['publie'] = true;
            }
        }

        if (!Actualite::isValid($inputs)) {
            return response()->json('Requête invalide', Response::HTTP_BAD_REQUEST);
        }


        if (!Actualite::isValid(['id' => $id])) {
            return response()->json('Not found', Response::HTTP_NOT_FOUND);
        }

        if($actualite['actif'] == false){
            return response()->json('Actualité supprimée', Response::HTTP_NOT_FOUND);
        }

        if($request->has('urlImage')) {
            $inputs['urlImage'] = urlencode($inputs['urlImage']);
        }
        $actualite->update($inputs);
        $actualite['urlImage'] = urldecode($actualite['urlImage']);
        return  redirect('admin/actualite')->withInput()->with('message', 'Modification enregistrée');
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

        foreach ($actualite->editions as $ed){
            $actualite->editions()->updateExistingPivot($ed->id, ['actif' => false]);
        }

        $actualite->actif = false;
        $actualite->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
