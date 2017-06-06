<?php

namespace App\Http\Controllers;

use App\Prix;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrixCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prixs = Prix::all()->where('actif', true);
        return view('')
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
        $inputs = $request->only(['nom', 'description', 'montant']);
        if (!Prix::isValid($inputs)) {
            return response()->json('Prix invalide', Response::HTTP_BAD_REQUEST);
        }

        $prix = new Prix([
            'nom' => $inputs['nom'],
            'description' => $inputs['description'],
            'montant' => $inputs['montant']
        ]);
        $prix->save();
        return  response()->json($prix, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $prix = Prix::find($id);

        if (!Prix::isValid(['id' => $id]) || $prix->actif == false) {
            return response()->json('Requête invalide', Response::HTTP_NOT_FOUND);
        }
        return $prix;
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
        $prix = Prix::find($id);

        $inputs = $request->intersect(['nom', 'description', 'montant']);
        if (!Prix::isValid($inputs)) {
            return response()->json('Requête invalide', Response::HTTP_BAD_REQUEST);
        }

        if (!Prix::isValid(['id' => $id])) {
            return response()->json('Not found', Response::HTTP_NOT_FOUND);
        }

        if($prix['actif'] == false){
            return response()->json('Prix déjà supprimé', Response::HTTP_NOT_FOUND);
        }

        $prix->update($inputs);
        return  response()->json($prix, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prix = Prix::find($id);

        if (!Prix::isValid(['id' => $id])) {
            return response()->json('Requête invalide', Response::HTTP_BAD_REQUEST);
        }

        if($prix['actif'] == false){
            return response()->json('Prix déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        $prix->actif = false;
        $prix->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
