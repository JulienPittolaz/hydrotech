<?php

namespace App\Http\Controllers\Back_office;

use App\Actualite;
use App\Categorie;
use App\Edition;
use App\Media;
use App\Membre;
use App\Presse;
use App\Prix;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

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
        $edition_columns = Edition::all()->first()['fillable'];
        return view('edition/index', ['editions' => $editions, 'columns' => $edition_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membres = Membre::all()->where('actif', true);
        $actualites = Actualite::all()->where('actif', true);
        $medias = Media::all()->where('actif', true);
        $sponsors = Sponsor::all()->where('actif', true);
        $categories = Categorie::all()->where('actif', true);
        $prixs = Prix::all()->where('actif', true);
        $presses = Presse::all()->where('actif', true);

        return view('edition.create',
            ['membres' => $membres,
                'actualites' => $actualites,
                'medias' => $medias,
                'sponsors' => $sponsors,
                'categories' => $categories,
                'prixs' => $prixs,
                'presses' => $presses
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $para = $request->only(['annee', 'nomEquipe', 'urlImageMedia', 'urlImageEquipe', 'lieu', 'dateDebut', 'dateFin', 'description', 'publie', 'membres', 'actualites', 'medias']);
        if (!Edition::isValid($para)) {
            return response()->json('Edition non valide', Response::HTTP_BAD_REQUEST);
        }
        //pour chaque actualite
        $para['urlImageMedia'] = urlencode($para['urlImageMedia']);
        $para['urlImageEquipe'] = urlencode($para['urlImageEquipe']);
        $edition = new Edition($para);
        $edition->save();
        $edition->urlImageMedia = urldecode($edition->urlImageMedia);
        $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);
        return redirect('admin/edition')->withInput()->with('message', 'Nouvelle édition ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edition = Edition::find($id);

        if (!Edition::isValid(['id' => $id]) || $edition->actif == false) {
            return response()->json('Edition non valide', Response::HTTP_BAD_REQUEST);
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
        $edition = Edition::find($id);
        if (!$edition) {
            return redirect('admin/edition');
        }
        $edition->first();
        $edition->urlImageMedia = urldecode($edition->urlImageMedia);
        $edition->urlImageEquipe = urldecode($edition->urlImageEquipe);
        return view('edition/edit', ['edition' => $edition]);
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
        $request->replace(['id' => $id]);
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
        return redirect('admin/edition')->withInput()->with('message', 'Modification enregistrée');
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
