<?php

namespace App\Http\Controllers\Front_office;

use App\Edition;
use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontCtrl extends Controller
{
    public function index() {
        $edition = Edition::where('actif', true)->where('publie', true)->latest()->first();
        if ($edition == null || $edition->actif == false) {
            return response()->json('Edition introuvable', Response::HTTP_NOT_FOUND);
        }
        $edition->urlImageMedia = urldecode($edition->urlImageMedia);
        $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);

        $actualites = $edition->actualites->->where('actif', true)->where('datePublication', '<=', date('Y-m-d') )->where('publie', true)->sortByDesc('datePublication');
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

        return view('welcome')->with('current_ed', $edition);
    }
}
