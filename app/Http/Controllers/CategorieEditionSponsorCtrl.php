<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Categorieeditionsponsor;
use App\Edition;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategorieEditionSponsorCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($categorie_id, $edition_id, $sponsor_id)
    {
        $categorie = Categorie::find($categorie_id);
        if (!Categorie::isValid(['id' => $categorie_id]) || $categorie->actif == false) {
            return response()->json('Catégorie inexistante', Response::HTTP_NOT_FOUND);
        }
        $edition = Edition::find($edition_id);
        if (!Edition::isValid(['id' => $edition_id]) || $edition->actif == false) {
            return response()->json('Edition inexistante', Response::HTTP_NOT_FOUND);
        }
        $sponsor = Sponsor::find($sponsor_id);
        if (!Sponsor::isValid(['id' => $sponsor_id]) || $sponsor->actif == false) {
            return response()->json('Sponsor inexistant', Response::HTTP_NOT_FOUND);
        }

        if(Categorieeditionsponsor::where(['categorie_id' => $categorie_id, 'edition_id' =>$edition_id, 'sponsor_id' => $sponsor_id])->first() != null){
            return response()->json('Association déjà existante', Response::HTTP_BAD_REQUEST);
        }
        $categorieEditionSponsor = new Categorieeditionsponsor();
        $categorieEditionSponsor->categorie()->associate($categorie);
        $categorieEditionSponsor->edition()->associate($edition);
        $categorieEditionSponsor->sponsor()->associate($sponsor);
        $categorieEditionSponsor->save();

        return response()->json($categorieEditionSponsor, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorie_id, $edition_id, $sponsor_id)
    {
        $categorieEditionSponsor = Categorieeditionsponsor::where(['categorie_id' => $categorie_id, 'edition_id' =>$edition_id, 'sponsor_id' => $sponsor_id])->first();
        if (!Sponsor::isValid(['id' => $categorieEditionSponsor->id])) {
            return response()->json('Sponsor non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($categorieEditionSponsor == null) {
            return response()->json('Sponsor introuvable', Response::HTTP_NOT_FOUND);
        }
        if($categorieEditionSponsor['actif'] == false){
            return response()->json('Sponsor déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        $categorieEditionSponsor->actif = false;
        $categorieEditionSponsor->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
