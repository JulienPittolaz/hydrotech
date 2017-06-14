<?php

namespace App\Http\Controllers\Back_office;

use App\Http\Controllers\Controller;
use App\Membre;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class MembreCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasRole(Role::READ, 'membre')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }

        $membres = Membre::all()->where('actif', true);

        $membre_columns = Membre::all()->first()['fillable'];
        return view('membre/index')->with(['membres' => $membres, 'columns' => $membre_columns]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasRole(Role::CREATE, 'membre')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        return view('membre/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->hasRole(Role::READ, 'membre')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $para = $request->only(['adresseMail', 'nom', 'prenom', 'dateNaissance', 'section', 'description', 'photoProfil']);
        if (!Membre::isValid($para)) {
            return redirect()->back()->withInput()->with('error', 'Membre invalide');
        }

        $para = $request->only(['adresseMail', 'nom', 'prenom', 'dateNaissance', 'section', 'description']);
        $image_data = $request['photoProfil'];
        $nom = str_replace(' ', '', $para['nom'].$para['prenom']);
        $source = fopen($image_data, 'r');
        $destination = fopen(public_path() . '/../storage/app/public/membres/'. $nom .'.jpg', 'w');
        stream_copy_to_stream($source, $destination);
        fclose($source);
        fclose($destination);
        $membre = new Membre($para);
        $membre->photoProfil = public_path() . '/../storage/app/public/membres/'. $nom .'.jpg';
        $membre->save();
        return redirect('admin/membre')->withInput()->with('message', 'Nouveau membre ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->hasRole(Role::READ, 'membre')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $membre = Membre::find($id);
        if (!Membre::isValid(['id' => $id]) || $membre->actif == false) {
            return redirect()->back()->withInput()->with('error', 'Membre invalide');
        }
        if (Membre::find($id) == null) {
            return redirect()->back()->withInput()->with('error', 'Membre introuvable');
        }
        return $membre;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasRole(Role::UPDATE, 'membre')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $membre = Membre::find($id);
        if (!$membre) {
            return redirect('admin/membre');
        }
        $membre->first();
        return view('membre/edit', ['membre' => $membre]);
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
        if (!Auth::user()->hasRole(Role::UPDATE, 'membre')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $membre = Membre::find($id);
        $para = $request->intersect(['adresseMail', 'nom', 'prenom', 'dateNaissance', 'section', 'description', 'photoProfil', 'role']);

        if($request['photoProfil'] != null){
            $para = $request->only(['adresseMail', 'nom', 'prenom', 'dateNaissance', 'section', 'description', 'role']);
            $ext = $request->file('photoProfil')->getClientOriginalExtension();
            $image = $request->file('photoProfil')->storeAs('public/membres', $membre->id . '.jpg');
            $membre->photoProfil = $image;
        }
        if (!Membre::isValid($para)) {
            return redirect()->back()->withInput()->with('error', 'Membre invalide');
        }
        if (!Membre::isValid(['id' => $id]) || $membre->actif == false) {
            return redirect()->back()->withInput()->with('error', 'Membre inexistant');
        }
        $membre->update($para);
        return redirect('admin/membre')->withInput()->with('message', 'Modification enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasRole(Role::DELETE, 'membre')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $membre = Membre::find($id);

        if (!Membre::isValid(['id' => $id])) {
            return redirect()->back()->withInput()->with('error', 'Membre invalide');
        }
        if ($membre == null) {
            return redirect()->back()->withInput()->with('error', 'Membre inexistant');
        }
        if($membre['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'Membre déjà supprimé');
        }
        foreach ($membre->editions as $ed){
            $membre->editions()->updateExistingPivot($ed->id, ['actif' => false]);
        }
        $membre->actif = false;
        $membre->save();
        return redirect('admin/membre')->withInput()->with('message', 'Membre supprimé');
    }
}
