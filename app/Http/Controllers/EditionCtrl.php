<?php

namespace App\Http\Controllers;

use App\Edition;
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
        $editions = Edition::all()->where('actif', true);
        $editions->where('publie', true);
        foreach ($editions as $edition) {
            $edition->urlImageMedia = urldecode($edition->urlImageMedia);
            $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);

            $actualites = $edition->actualites;
            foreach ($actualites as $actualite) {
                $actualite->urlImage = urldecode($actualite->urlImage);
            }
            $categorieEditionSponsors = $edition->categorieeditionsponsors;
            foreach ($categorieEditionSponsors as $catEdSp) {
                $sponsor = $catEdSp->sponsor;
                $sponsor->urlLogo = urldecode($sponsor->urlLogo);
                $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);

                /*foreach ($sponsor->categorieeditionsponsors as $categorieDuSponsor){
                    $ed = $categorieDuSponsor->edition;
                    $ed->annee;
                }*/
                $catEdSp->categorie;
            }
            $medias = $edition->medias;
            foreach ($medias as $media) {
                $media->url = urldecode($media->url);
            }
            $membres = $edition->membres;
            foreach ($membres as $membre) {
                $membre->photoProfil = urldecode($membre->photoProfil);
            }
            $presses = $edition->presses;
            foreach ($presses as $press) {
                $press->url = urldecode($press->url);
            }
            $edition->prixs;


        }
        return $editions;
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
        if (!Edition::isValid(['annee' => $annee]) || $edition->actif == false) {
            return response()->json('Annee edition non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($edition == null) {
            return response()->json('Edition introuvable', Response::HTTP_NOT_FOUND);
        }
        $edition->urlImageMedia = urldecode($edition->urlImageMedia);
        $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);

        $actualites = $edition->actualites;
        foreach ($actualites as $actualite) {
            $actualite->urlImage = urldecode($actualite->urlImage);
        }
        $categorieEditionSponsors = $edition->categorieeditionsponsors;
        foreach ($categorieEditionSponsors as $catEdSp) {
            $sponsor = $catEdSp->sponsor;
            $sponsor->urlLogo = urldecode($sponsor->urlLogo);
            $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);

            /*foreach ($sponsor->categorieeditionsponsors as $categorieDuSponsor){
                $ed = $categorieDuSponsor->edition;
                $ed->annee;
            }*/
            $catEdSp->categorie;
        }
        $medias = $edition->medias;
        foreach ($medias as $media) {
            $media->url = urldecode($media->url);
        }
        $membres = $edition->membres;
        foreach ($membres as $membre) {
            $membre->photoProfil = urldecode($membre->photoProfil);
        }
        $presses = $edition->presses;
        foreach ($presses as $press) {
            $press->url = urldecode($press->url);
        }
        $edition->prixs;
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
