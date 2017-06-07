<?php

namespace App\Http\Controllers;

use App\Edition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Membre;

class EditionAssociationCtrl extends Controller
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
    public function store($edition_id, $type_ressource, $resource_id, $role)
    {
        if (!Edition::isValid(['id' => $edition_id ])) {
            return response()->json('Media non valide', Response::HTTP_BAD_REQUEST);
        }
        if($role == null){
            return response()->json('Role non valide', Response::HTTP_BAD_REQUEST);
        }
        $objet = call_user_func_array(['\\App\\'.ucfirst($type_ressource), 'find'], [$resource_id]);
        if(!get_class($objet)::isValid(['id' => $resource_id])){
            return response()->json('Ressource non valide', Response::HTTP_BAD_REQUEST);
        }
        $edition = Edition::find($edition_id);
        if($edition['actif'] == false || $objet['actif'] == false){
            return response()->json('Impossible d\'ajouter cette association', Response::HTTP_BAD_REQUEST);
        }
        foreach ($objet->editions as $ed){
            if($ed['id'] == $edition_id){
                return response()->json('Association déjà présente', Response::HTTP_BAD_REQUEST);
            }
        }
        $type_ressource = $type_ressource . 's';

        $edition->$type_ressource()->save($objet, ['roleMembre' => $role]);
        return response()->json('OK', Response::HTTP_CREATED);
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
    public function destroy($edition_id, $type_ressource, $resource_id)
    {
        if (!Edition::isValid(['id' => $edition_id ])) {
            return response()->json('Edition non valide', Response::HTTP_BAD_REQUEST);
        }
        $objet = call_user_func_array(['\\App\\'.ucfirst($type_ressource), 'find'], [$resource_id]);
        if(!get_class($objet)::isValid(['id' => $resource_id])){
            return response()->json('Ressource non valide', Response::HTTP_BAD_REQUEST);
        }
        $edition = Edition::find($edition_id);

        $type_ressource = $type_ressource . 's';
        $edition->$type_ressource()->detach($objet);

        return response()->json('OK', Response::HTTP_OK);
    }
}
