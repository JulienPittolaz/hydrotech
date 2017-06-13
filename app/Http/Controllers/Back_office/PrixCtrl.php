<?php

namespace App\Http\Controllers\Back_office;

use App\Http\Controllers\Controller;
use App\Prix;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class PrixCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prixs = Prix::all()->where('actif', true);
        $prix_columns = Prix::all()->first()['fillable'];
        return view('prix/index', ['prixs' => $prixs, 'columns' => $prix_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prix.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only(['nom', 'description', 'montant']);
        $inputs['montant'] = (int)$inputs['montant'];

        if (!Prix::isValid($inputs)) {
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }

        $prix = new Prix([
            'nom' => $inputs['nom'],
            'description' => $inputs['description'],
            'montant' => $inputs['montant']
        ]);
        $prix->save();
        return  redirect('admin/prix')->withInput()->with('message', 'Nouveau prix ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $prix = Prix::find($id);

        if (!Prix::isValid(['id' => $id]) || $prix->actif == false) {
            return redirect()->back()->withInput()->with('error', 'Prix invalide');
        }
        if (Prix::find($id) == null) {
            return redirect()->back()->withInput()->with('error', 'Prix introuvable');
        }
        return $prix;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prix = Prix::find($id);
        if(!$prix) {
            return redirect('admin/prix');
        }
        $prix->first();
        return view('prix/edit', ['prix' => $prix]);
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
        $prix = Prix::find($id);

        $inputs = $request->intersect(['nom', 'description', 'montant']);
        $inputs['montant'] = (int)$inputs['montant'];
        $request->replace(['id' => $id]);
        if (!Prix::isValid($inputs)) {
            return redirect()->back()->withInput()->with('error', 'Prix invalide');
        }

        if (!Prix::isValid(['id' => $id])  || $prix->actif == false) {
            return redirect()->back()->withInput()->with('error', 'Prix inexistant');
        }

        if($prix['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'Prix déjà supprimé');
        }

        $prix->update($inputs);
        return  redirect('admin/prix')->withInput()->with('message', 'Modification enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prix = Prix::find($id);

        if (!Prix::isValid(['id' => $id])) {
            return redirect()->back()->withInput()->with('error', 'Prix invalide');
        }
        if ($prix == null) {
            return redirect()->back()->withInput()->with('error', 'Prix introuvable');
        }
        if($prix['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'Prix déjà supprimé');
        }
        foreach ($prix->editions as $ed){
            $prix->editions()->updateExistingPivot($ed->id, ['actif' => false]);
        }
        $prix->actif = false;
        $prix->save();
        return redirect('admin/prix')->withInput()->with('message', 'Prix supprimé');
    }
}
