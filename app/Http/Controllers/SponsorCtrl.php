<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SponsorCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all()->where('actif', true);


        foreach ($sponsors as $sponsor){
            $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);

            $categorieSponsorEditions = $sponsor->categorieeditionsponsors;
            foreach ($categorieSponsorEditions as $categorieDuSponsor){
                $ed = $categorieDuSponsor->edition;
                $ed->annee;
            }
        }
        return $sponsors;
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
    public function store(Request $request)
    {
        $para = $request->only(['nom', 'urlLogo', 'urlSponsor']);
        if (!Sponsor::isValid($para)) {
            return response()->json('Sponsor non valide', Response::HTTP_BAD_REQUEST);
        }
        $para['urlSponsor'] = urlencode($para['urlSponsor']);
        $sponsor = new Sponsor($para);
        $sponsor->save();
        $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);
        return response()->json($sponsor, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        foreach ($sponsor->categorieeditionsponsors as $cat){
            $cat->edition->annee;
        }
        if (!Sponsor::isValid(['id' => $id]) || $sponsor->actif == false) {
            return response()->json('Sponsor non valide', Response::HTTP_BAD_REQUEST);
        }
        if (Sponsor::find($id) == null) {
            return response()->json('Sponsor introuvable', Response::HTTP_NOT_FOUND);
        }
        $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);
        return $sponsor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
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
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::find($id);
        $para = $request->intersect(['nom', 'urlLogo', 'urlSponsor']);
        if (!Sponsor::isValid($para)) {
            return response()->json('Sponsor non valide', Response::HTTP_BAD_REQUEST);
        }
        if (!Sponsor::isValid(['id' => $id]) || $sponsor->actif == false) {
            return response()->json('Sponsor inexistant', Response::HTTP_NOT_FOUND);
        }
        if($request->has('urlSponsor')){
            $para['urlSponsor'] = urlencode($para['urlSponsor']);
        }
        $sponsor->update($para);
        $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);
        return response()->json($sponsor, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::find($id);

        if (!Sponsor::isValid(['id' => $id])) {
            return response()->json('Sponsor non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($sponsor == null) {
            return response()->json('Sponsor introuvable', Response::HTTP_NOT_FOUND);
        }
        if($sponsor['actif'] == false){
            return response()->json('Sponsor déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        foreach ($sponsor->categorieeditionsponsors as $categoriesEditionSponsorAssociees){
            $categoriesEditionSponsorAssociees->pivot->actif = false;
            $categoriesEditionSponsorAssociees->save();
        }
        $sponsor->actif = false;
        $sponsor->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
