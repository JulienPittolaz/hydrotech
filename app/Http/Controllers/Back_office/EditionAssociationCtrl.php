<?php

namespace App\Http\Controllers\Back_office;

use App\Edition;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class EditionAssociationCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type_ressource)
    {

        //$objets = call_user_func(['\\App\\'.ucfirst($type_ressource), 'all'])->where('actif', true);
        $editions = Edition::all()->where('actif', true);
        $ressources = $type_ressource . 's';

        foreach ($editions as $edition) {
            //$objets = call_user_func(['\\App\\'.ucfirst($type_ressource), 'all'])->where('actif', true);

            $objets = $edition->$ressources;
            dd($objets);
            $edition->objetsDeLedition = $objets;
        }

        /* $categories = Categorie::all()->where('actif', true);
         foreach ($categories as $categorie) {
             foreach ($categorie->categorieeditionsponsors->where('edition_id', $edition->id) as $ces){
                 $ces->edition;
                 $ces->sponsor;
             }
         }*/

        /*
        foreach ($editions as $edition){
            foreach ($edition->$type_ressource as $ressource){
                $edition->nomResource = $ressource->titre;

            }
        }*/
        /*
                foreach ($editions as $edition){
                    foreach ($edition->objetsDeLedition as $obj){
                        dd($obj->titre);
                    }
                }*/

        return view('editionAssociation/index', ['editions' => $editions, 'typeRessource' => $type_ressource]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($annee, $type_ressource)
    {
        $edition = Edition::all()->where('actif', true)->where('annee', $annee)->first();
        $objets = call_user_func(['\\App\\' . ucfirst($type_ressource), 'all'])->where('actif', true);

        $ressources = $type_ressource . 's';

        $edition->objetsDeLedition = $edition->$ressources;


        return view('editionAssociation/create', ['annee' => $annee, 'type_ressource' => $type_ressource, 'objets' => $objets, 'edition' => $edition]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edition_id = $request['edition_id'];
        $type_ressource = $request['type_ressource'];
        $resource_id = $request['ressource_id'];

        if (!Edition::isValid(['id' => $edition_id])) {
            return redirect()->back()->withInput()->with('error', 'edition invalide');
        }
        $objet = call_user_func_array(['\\App\\' . ucfirst($type_ressource), 'find'], [$resource_id]);
        //$objet = call_user_func(['\\App\\'.ucfirst($type_ressource), 'all'])->where('actif', true)->where('id', $resource_id);
        if (!get_class($objet)::isValid(['id' => $resource_id])) {
            return redirect()->back()->withInput()->with('error', 'ressource invalide');
        }
        $edition = Edition::find($edition_id);
        if ($edition['actif'] == false || $objet['actif'] == false) {
            return redirect()->back()->withInput()->with('error', 'impossible d\'ajouter l\'association');
        }
        foreach ($objet->editions as $ed) {
            if ($ed['id'] == $edition_id && $ed->pivot->actif == true) {
                return redirect()->back()->withInput()->with('error', 'association déjà présente');
            }
        }
        /* foreach ($objet->editions as $association){
             if($association->pivot->actif == true){
                 return response()->json('Association déjà présente', Response::HTTP_BAD_REQUEST);
             };
         }*/
        /*if($objet->editions()->where(['edition_id' => $edition_id, $type_ressource . '_id' =>$resource_id, 'actif' => true])->first() != null) {
            return response()->json('Association déjà présente', Response::HTTP_BAD_REQUEST);
        }
           */
        $type_ressource = $type_ressource . 's';
        if ($type_ressource == 'membres' && $request['role'] != null) {
            $edition->$type_ressource()->save($objet, ['roleMembre' => $request['role']]);
        } else {
            $edition->$type_ressource()->save($objet);
        }
        return redirect('admin/associationedition/'. $type_ressource)->with('message', 'association enregistrée');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($edition_id, $type_ressource, $resource_id)
    {
        if (!Edition::isValid(['id' => $edition_id])) {
            return redirect()->back()->withInput()->with('error', 'edition invalide');
        }
        $objet = call_user_func_array(['\\App\\' . ucfirst($type_ressource), 'find'], [$resource_id]);
        if (!get_class($objet)::isValid(['id' => $resource_id])) {
            return redirect()->back()->withInput()->with('error', 'ressource invalide');
        }
        $edition = Edition::find($edition_id);


        foreach ($objet->editions as $ed) {
            if ($ed['id'] == $edition_id && $ed->pivot->actif == false) {
                return redirect()->back()->withInput()->with('error', 'association inexistante');
            }
            $objet->editions()->updateExistingPivot($ed->id, ['actif' => false]);
        }
        return redirect('admin/associationedition/'. $type_ressource)->with('message', 'association enregistrée');
    }
}
