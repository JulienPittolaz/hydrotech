<?php

namespace App\Http\Controllers\Back_office;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


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
            $sponsor->urlLogo = urldecode($sponsor->urlLogo);
            $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);

            $categorieSponsorEditions = $sponsor->categorieeditionsponsors;
            foreach ($categorieSponsorEditions as $categorieDuSponsor){
                $ed = $categorieDuSponsor->edition;
                $ed->annee;
                $ed->urlImageMedia = urldecode($ed->urlImageMedia);
                $ed->urlImageEquipe = urldecode($ed->urlImageEquipe);
            }
        }
        $sponsor_columns = Sponsor::all()->first()['fillable'];
        return view('sponsor/index', ['sponsors' => $sponsors, 'columns' => $sponsor_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$para = $request->only(['nom', 'urlLogo', 'urlSponsor']);
        if (!Sponsor::isValid($para)) {
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }
        $para['urlLogo'] = urlencode($para['urlLogo']);
        $para['urlSponsor'] = urlencode($para['urlSponsor']);*/

        $para = $request->only(['nom', 'urlSponsor']);
        $ext = $request->file('urlLogo')->getClientOriginalExtension();
        $image = $request->file('urlLogo')->storeAs('public/sponsors', $para['nom'] . '.jpg');
        $sponsor = new Sponsor($para);
        $sponsor->urlLogo = $image;
        $sponsor->save();
        //$sponsor->urlLogo = urldecode($sponsor->urlLogo);
        $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);
        return redirect('admin/sponsor')->withInput()->with('message', 'Nouveau sponsor ajouté');
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
        if (!Sponsor::isValid(['id' => $id]) || $sponsor->actif == false) {
            return response()->json('Sponsor non valide', Response::HTTP_BAD_REQUEST);
        }
        if (Sponsor::find($id) == null) {
            return response()->json('Sponsor introuvable', Response::HTTP_NOT_FOUND);
        }
        $sponsor->urlLogo = urldecode($sponsor->urlLogo);
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
        $sponsor = Sponsor::find($id);
        if (!$sponsor) {
            return redirect('admin/sponsor');
        }
        $sponsor->first();
        $sponsor->urlLogo = urldecode($sponsor->urlLogo);
        $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);
        return view('sponsor/edit', ['sponsor' => $sponsor]);
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
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }
        if (!Sponsor::isValid(['id' => $id]) || $sponsor->actif == false) {
            return response()->json('Sponsor inexistant', Response::HTTP_NOT_FOUND);
        }
        if($request->has('urlLogo')){
            $para['urlLogo'] = urlencode($para['urlLogo']);
        }
        if($request->has('urlSponsor')){
            $para['urlSponsor'] = urlencode($para['urlSponsor']);
        }
        $sponsor->update($para);
        $sponsor->urlLogo = urldecode($sponsor->urlLogo);
        $sponsor->urlSponsor = urldecode($sponsor->urlSponsor);
        return redirect('admin/sponsor')->withInput()->with('message', 'Modification enregistrée');
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
        $sponsor->actif = false;
        $sponsor->save();
        return redirect('admin/sponsor')->withInput()->with('message', 'Sponsor supprimé');
    }
}
