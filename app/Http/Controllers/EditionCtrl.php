<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Edition;
use App\Sponsor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EditionCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editions = Edition::all()->where('actif', true)->where('publie', true)->sortByDesc('annee');



        foreach ($editions as $edition) {
            $edition->urlImageMedia = urldecode($edition->urlImageMedia);
            $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);

            $actualites = $edition->actualites;
            foreach ($actualites as $actualite) {
                $actualite->urlImage = urldecode($actualite->urlImage);
            }
            $categorieEditionSponsors = $edition->categorieeditionsponsors;

            $categories = Categorie::all()->where('actif', true);
            foreach ($categories as $categorie) {
                foreach ($categorie->categorieeditionsponsors->where('edition_id', $edition->id) as $ces) {
                    $ces->edition;
                    foreach ($ces->sponsor->categorieeditionsponsors as $c){
                        $c->sponsor->urlLogo = urldecode($c->sponsor->urlLogo);
                        $c->sponsor->urlSponsor = urldecode($c->sponsor->urlSponsor);
                        $c->edition;
                        $c->edition->urlImageMedia = urldecode($c->edition->urlImageMedia);
                        $c->edition->urlImageEquipe = urldecode($c->edition->urlImageEquipe);
                    }
                }
            }

            $edition->sponsors = $categories;
            foreach ($categorieEditionSponsors as $catEdSp) {
                /*foreach ($catEdSp as $ces){
                    $sponsor = $ces->sponsor;
                    $sponsor->urlLogo = urldecode($sponsor->urlLogo);
                    $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);
                    $categorie = $ces->categorie;
                }*/
                //$sponsor = $catEdSp->sponsor;
                //$sponsor->urlLogo = urldecode($sponsor->urlLogo);
                //$sponsor->urlSponsor = urldecode($sponsor->urlSponsor);

                /*$categorie = $catEdSp->categorie;
                foreach ($categorie->categorieeditionsponsors->where('edition_id', $edition->id) as $ces){
                    $ces->sponsors;
                }*/
                //$categorieEditionSponsors = $edition->categorieeditionsponsors->groupBy('categorie_id');


                /*foreach ($sponsor->categorieeditionsponsors as $categorieDuSponsor){
                    $ed = $categorieDuSponsor->edition;
                    $ed->annee;
                }*/
                /*
                if(!array_has($listeCategories, $categorie)){
                    array_add($listeCategories, $categorie['attributes']['id'], $categorie);
                }*/

            }


            /*$categorieEditionSponsors = $edition->categorieeditionsponsors->groupBy('categorie.nom');
            dd($categorieEditionSponsors);*/


            //$edition-->put('listeSponsors', $categorieEditionSponsors);
            //$edition->listeSponsors = Categorie::all();
            /*$listeSponsors = '';
            foreach (Categorie::all() as $listeCategories){
                foreach($listeCategories->categorieeditionsponsors() as $association){
                    $listeSponsors = $listeSponsors . $association->sponsors;
                }
            }
            $edition->listeSponsors = $listeSponsors;*/


            $medias = $edition->medias;
            foreach ($medias as $media) {
                $media->url = urldecode($media->url);
            }
            $membres = $edition->membres;
            foreach ($membres as $membre) {
                $membre->photoProfil = urldecode($membre->photoProfil);
                $membre->editions;
            }
            $presses = $edition->presses;
            foreach ($presses as $press) {
                $press->url = urldecode($press->url);
            }
            $edition->prixs;


        }

        $arrResults = [];
        foreach ($editions as $item) {
            $arrResults[] = $item;
        }
        return response()->json($arrResults);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $para = $request->only(['annee', 'nomEquipe', 'urlImageMedia', 'urlImageEquipe', 'lieu', 'dateDebut', 'dateFin', 'description', 'publie']);
        if (!Edition::isValid($para)) {
            return response()->json('Edition non valide', Response::HTTP_BAD_REQUEST);
        }
        $para['urlImageMedia'] = urlencode($para['urlImageMedia']);
        $para['urlImageEquipe'] = urlencode($para['urlImageEquipe']);
        $edition = new Edition($para);
        $edition->save();
        $edition->urlImageMedia = urldecode($edition->urlImageMedia);
        $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);
        return response()->json($edition, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($annee)
    {
        $edition = Edition::all()->where('annee', $annee)->first();
        if ($edition == null || $edition->actif == false) {
            return response()->json('Edition introuvable', Response::HTTP_NOT_FOUND);
        }
        $edition->urlImageMedia = urldecode($edition->urlImageMedia);
        $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);

        $actualites = $edition->actualites;
        foreach ($actualites as $actualite) {
            $actualite->urlImage = urldecode($actualite->urlImage);
        }

     /*   $categorieEditionSponsors = $edition->categorieeditionsponsors;
        foreach ($categorieEditionSponsors as $catEdSp) {
            $sponsor = $catEdSp->sponsor;
            $sponsor->urlLogo = urldecode($sponsor->urlLogo);
            $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);

            $catEdSp->categorie;


        }*/

        $medias = $edition->medias;
        foreach ($medias as $media) {
            $media->url = urldecode($media->url);
        }
        $membres = $edition->membres;
        foreach ($membres as $membre) {
            $membre->photoProfil = urldecode($membre->photoProfil);
            $membre->editions;
        }
        $presses = $edition->presses;
        foreach ($presses as $press) {
            $press->url = urldecode($press->url);
        }
        $edition->prixs;

        $categories = Categorie::all()->where('actif', true);
        foreach ($categories as $categorie) {
            foreach ($categorie->categorieeditionsponsors->where('edition_id', $edition->id) as $ces) {
                $ces->sponsor->urlSponsor = urldecode($ces->sponsor->urlSponsor);
                $ces->sponsor->urlLogo = urldecode($ces->sponsor->urlLogo);
                foreach ($ces->sponsor->categorieeditionsponsors as $c){
                    $c->edition->urlImageMedia = urldecode($c->edition->urlImageMedia);
                    $c->edition->urlImageEquipe = urldecode($c->edition->urlImageEquipe);
                }
            }
        }

        $edition->sponsors = $categories;
        return $edition;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edition = Edition::find($id);
        $para = $request->intersect(['annee', 'nomEquipe', 'urlImageMedia', 'urlImageEquipe', 'lieu', 'dateDebut', 'dateFin', 'description', 'publie']);
        if($request->has('publie')) {
            if ($para['publie'] == 'false') {
                $para['publie'] = false;
            }
            if ($para['publie'] == 'true') {
                $para['publie'] = true;
            }
        }

        if (!Edition::isValid($para)) {
            return response()->json('Edition non valide', Response::HTTP_BAD_REQUEST);
        }
        if (!Edition::isValid(['id' => $id]) || $edition->actif == false) {
            return response()->json('Edition inexistante', Response::HTTP_NOT_FOUND);
        }
        if($request->has('urlImageMedia')){
            $para['urlImageMedia'] = urlencode($para['urlImageMedia']);
        }
        if($request->has('urlImageEquipe')){
            $para['urlImageEquipe'] = urlencode($para['urlImageEquipe']);
        }
        $edition->update($para);
        $edition->urlImageMedia = urldecode($edition->urlImageMedia);
        $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);
        return response()->json($edition, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edition = Edition::find($id);

        if (!Edition::isValid(['id' => $id])) {
            return response()->json('Edition non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($edition == null) {
            return response()->json('Edition introuvable', Response::HTTP_NOT_FOUND);
        }
        if($edition['actif'] == false){
            return response()->json('Edition déjà supprimée', Response::HTTP_NOT_FOUND);
        }
        foreach ($edition->categorieeditionsponsors as $categoriesEditionSponsorAssociees){
            $categoriesEditionSponsorAssociees->pivot->actif = false;
            $categoriesEditionSponsorAssociees->save();
        }
        $edition->actif = false;
        if ($edition['publie'] == true){
            $edition['publie'] == false;
        }
        $edition->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
