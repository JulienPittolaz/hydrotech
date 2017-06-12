<?php

namespace App\Http\Controllers\Front_office;

use App\Edition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontCtrl extends Controller
{
    public function index() {
        $edition = Edition::latest()->first();
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

        return view('welcome')->with('current_ed', $edition);
    }
}
