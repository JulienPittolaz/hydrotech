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
        //dd($request);
        $inputs = $request->only(['titre', 'datePublication', 'contenu', 'urlImage', 'publie']);
        if (!Actualite::isValid($inputs)) {
            return redirect()->back()->withInput()->with('error', 'Actualité invalide');
        }
        $inputs = $request->only(['titre', 'datePublication', 'contenu', 'publie']);
//        $actualite = new Actualite([
//            'titre' => $inputs['titre'],
//            'datePublication' => $inputs['datePublication'],
//            'contenu' => $inputs['contenu'],
//            'auteur' => 'UTILISATEUR TEST',
//            //'auteur' => Auth::user()->name,
//            'publie' => $inputs['publie']
//        ]);
        $actualite = new Actualite($inputs);
        $actualite->auteur = "UTILISATEUR TEST";
        $actualite->urlImage = 'tagueule.jpeg';
        $actualite->save();
        //$ext = $request->file('urlImage')->getClientOriginalExtension();
        $image = $request->file('urlImage')->storeAs('public/actualites', $actualite->id . '.jpg');
        $actualite->urlImage = $image;
        $actualite->save();
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
        if($request['urlImage'] != null){
            $para = $request->only(['titre', 'datePublication', 'contenu', 'publie']);
            $ext = $request->file('urlImage')->getClientOriginalExtension();
            $image = $request->file('urlImage')->storeAs('public/actualites', $actualite->id . '.jpg');
            $actualite->urlImage = $image;
        }
        if (!Actualite::isValid($inputs)) {
            return redirect()->back()->withInput()->with('error', 'Actualité invalide');
        }


        if (!Actualite::isValid(['id' => $id])) {
            return redirect()->back()->withInput()->with('error', 'Actualité inexistante');
        }

        if($actualite['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'Actualité déjà supprimée');
        }

        $actualite->update($inputs);
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
            return redirect()->back()->withInput()->with('error', 'Actualité invalide');
        }

        if($actualite['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'Actualité inexistante');
        }

        foreach ($actualite->editions as $ed){
            $actualite->editions()->updateExistingPivot($ed->id, ['actif' => false]);
        }

        $actualite->actif = false;
        $actualite->save();
        return redirect('admin/actualite')->withInput()->with('message', 'Actualité supprimée');
    }
}
