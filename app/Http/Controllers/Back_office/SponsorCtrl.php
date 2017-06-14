<?php

namespace App\Http\Controllers\Back_office;

use App\Role;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;


class SponsorCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasRole(Role::READ, 'sponsor')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
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
        if (!Auth::user()->hasRole(Role::CREATE, 'sponsor')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
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
        if (!Auth::user()->hasRole(Role::CREATE, 'sponsor')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $para = $request->only(['nom', 'urlLogo', 'urlSponsor']);
        //dd($request->file('urlLogo'));
        if (!Sponsor::isValid($para)) {
            return redirect()->back()->withInput()->withErrors('error', 'Sponsor invalide');
        }

        $para['urlSponsor'] = urlencode($para['urlSponsor']);
        $para = $request->only(['nom', 'urlSponsor']);
        $image_data = $request['urlLogo'];
        $nom = str_replace(' ', '', $para['nom']);
        $source = fopen($image_data, 'r');
        $destination = fopen(public_path() . '/../storage/app/public/sponsors/'. $nom .'.jpg', 'w');
        stream_copy_to_stream($source, $destination);
        fclose($source);
        fclose($destination);
        $sponsor = new Sponsor($para);
        $sponsor->urlLogo = url('/') . '/storage/sponsors/'. $nom .'.jpg';
        $sponsor->save();
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
        if (!Auth::user()->hasRole(Role::READ, 'sponsor')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $sponsor = Sponsor::find($id);
        if (!Sponsor::isValid(['id' => $id]) || $sponsor->actif == false) {
            return redirect('admin/sponsor')->withInput()->with('error', 'Sponsor non valide');
        }
        if (Sponsor::find($id) == null) {
            return redirect('admin/sponsor')->withInput()->with('error', 'Sponsor introuvable');
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
        if (!Auth::user()->hasRole(Role::UPDATE, 'sponsor')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $sponsor = Sponsor::find($id);
        if (!$sponsor) {
            return redirect('admin/sponsor');
        }
        $sponsor->first();
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
        if (!Auth::user()->hasRole(Role::UPDATE, 'sponsor')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $sponsor = Sponsor::find($id);
        $para = $request->intersect(['nom', 'urlLogo', 'urlSponsor']);
        if($request['urlLogo'] != null){
            $para = $request->only(['nom', 'urlSponsor']);
            $image_data = $request['urlLogo'];
            $nom = str_replace(' ', '', $para['nom']);
            unlink(public_path() . '/../storage/app/public/sponsors/'. $nom .'.jpg');
            $source = fopen($image_data, 'r');
            $destination = fopen(public_path() . '/../storage/app/public/sponsors/'. $nom .'.jpg', 'w');
            stream_copy_to_stream($source, $destination);
            fclose($source);
            fclose($destination);
            $para['urlLogo'] = url('/') . '/storage/sponsors/'. $nom .'.jpg';
        }
        if (!Sponsor::isValid($para)) {
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }
        if (!Sponsor::isValid(['id' => $id]) || $sponsor->actif == false) {
            return redirect('admin/sponsor')->withInput()->with('error', 'Sponsor inexistant');
        }
        if($request->has('urlSponsor')){
            $para['urlSponsor'] = urlencode($para['urlSponsor']);
        }

        $sponsor->update($para);

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
        if (!Auth::user()->hasRole(Role::DELETE, 'sponsor')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $sponsor = Sponsor::find($id);

        if (!Sponsor::isValid(['id' => $id])) {
            return rredirect('admin/sponsor')->withInput()->with('error', 'Sponsor non valide');
        }
        if ($sponsor == null) {
            return redirect('admin/sponsor')->withInput()->with('error', 'Sponsor introuvable');
        }
        if($sponsor['actif'] == false){
            return redirect('admin/sponsor')->withInput()->with('error', 'Sponsor déjà supprimé');
        }
        foreach ($sponsor->categorieeditionsponsors as $categoriesEditionSponsorAssociees){
            $categoriesEditionSponsorAssociees->actif = false;
            $categoriesEditionSponsorAssociees->save();
        }
        $sponsor->actif = false;
        $sponsor->save();
        return redirect('admin/sponsor')->withInput()->with('message', 'Sponsor supprimé');
    }
}
