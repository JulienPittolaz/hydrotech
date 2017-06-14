<?php

namespace App\Http\Controllers\Back_office;

use App\Categorie;
use App\Categorieeditionsponsor;
use App\Edition;
use App\Role;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Auth;

class CategorieEditionSponsorCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasRole(Role::READ, 'edition')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
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
        if (!Auth::user()->hasRole(Role::CREATE, 'edition')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
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
        if (!Auth::user()->hasRole(Role::CREATE, 'edition')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $categorie_id = $request['categorie_id'];
        $edition_id = $request['edition_id'];
        $sponsor_id = $request['sponsor_id'];
        $categorie = Categorie::find($categorie_id);
        if (!Categorie::isValid(['id' => $categorie_id]) || $categorie->actif == false) {
            return redirect()->back()->withInput()->with('error', 'categorie inexistante');
        }
        $edition = Edition::find($edition_id);
        if (!Edition::isValid(['id' => $edition_id]) || $edition->actif == false) {
            return redirect()->back()->withInput()->with('error', 'edition inexistante');
        }
        $sponsor = Sponsor::find($sponsor_id);
        if (!Sponsor::isValid(['id' => $sponsor_id]) || $sponsor->actif == false) {
            return redirect()->back()->withInput()->with('error', 'sponsor inexistante');
        }

        if(Categorieeditionsponsor::where(['categorie_id' => $categorie_id, 'edition_id' =>$edition_id, 'sponsor_id' => $sponsor_id, 'actif' => true])->first() != null){
            return redirect()->back()->withInput()->with('error', 'association sponsor inexistante');
        }
        $categorieEditionSponsor = new Categorieeditionsponsor();
        $categorieEditionSponsor->categorie()->associate($categorie);
        $categorieEditionSponsor->edition()->associate($edition);
        $categorieEditionSponsor->sponsor()->associate($sponsor);
        $categorieEditionSponsor->save();

        return redirect('admin/associationsponsor')->with('message', 'association sponsor ajoutée');
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
        if (!Auth::user()->hasRole(Role::DELETE, 'edition')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
       $categorieEditionSponsor = Categorieeditionsponsor::all()->where('categorie_id', $categorie_id)
            ->where('edition_id', $edition_id)
            ->where('sponsor_id', $sponsor_id)->first();

        if ($categorieEditionSponsor == null) {
            return redirect()->back()->withInput()->with('error', 'association inexistante');
        }
        if($categorieEditionSponsor['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'association sponsor déjà supprimée');
        }
        $categorieEditionSponsor->actif = false;
        $categorieEditionSponsor->save();
        return redirect('admin/associationsponsor')->with('message', 'association sponsor supprimée');
    }
}
