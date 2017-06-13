<?php

namespace App\Http\Controllers\Back_office;

use App\Categorie;
use App\Categorieeditionsponsor;
use App\Edition;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CategorieEditionSponsorCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editions = Edition::all()->where('actif', true);
        $editions->where('publie', true);



        foreach ($editions as $edition) {
            $edition->urlImageMedia = urldecode($edition->urlImageMedia);
            $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);

            $actualites = $edition->actualites;
            foreach ($actualites as $actualite) {
                $actualite->urlImage = urldecode($actualite->urlImage);
            }
            //$categorieEditionSponsors = $edition->categorieeditionsponsors->where('actif', true)->where('edition_id', $edition->id);

            $categories = Categorie::all()->where('actif', true);
            foreach ($categories as $categorie) {
                foreach ($categorie->categorieeditionsponsors->where('actif', true)->where('edition_id', $edition->id) as $ces){
                    $ces->edition;
                    $ces->sponsor;
                }
            }
            $edition->categorie = $categories;

        }
        $assoc = Categorieeditionsponsor::all()->where('actif', true);
        return view('categorieeditionsponsor/index', ['editions' => $editions, 'association' => $assoc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($annee)
    {
        $categories = Categorie::all()->where('actif', true);
        $sponsors = Sponsor::all()->where('actif', true);
        $edition = Edition::all()->where('annee', $annee)->first();
        return view('categorieeditionsponsor/create', ['annee' => $annee, 'categories' => $categories, 'sponsors' => $sponsors, 'edition' => $edition]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie_id = $request['categorie_id'];
        $edition_id = $request['edition_id'];
        $sponsor_id = $request['sponsor_id'];
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

        if(Categorieeditionsponsor::where(['categorie_id' => $categorie_id, 'edition_id' =>$edition_id, 'sponsor_id' => $sponsor_id, 'actif' => true])->first() != null){
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
       $categorieEditionSponsor = Categorieeditionsponsor::all()->where('categorie_id', $categorie_id)
            ->where('edition_id', $edition_id)
            ->where('sponsor_id', $sponsor_id)->first();

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
