<?php

namespace App\Http\Controllers\Back_office;

use App\Presse;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;


class PresseCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasRole(Role::READ, 'presse')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $presses = Presse::all()->where('actif', true);
        foreach ($presses as $press) {
            $press->url = urldecode($press->url);
        }
        $presse_columns = Presse::all()->first()['fillable'];
        return view('presse/index', ['presses' => $presses, 'columns' => $presse_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasRole(Role::CREATE, 'presse')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        return view('presse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->hasRole(Role::CREATE, 'presse')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $para = $request->only(['url', 'titreArticle', 'description', 'dateParution', 'nomPresse']);
        if (!Presse::isValid($para)) {
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }
        $para['url'] = urlencode($para['url']);
        $presse = new Presse($para);
        $presse->save();
        $presse->url = urldecode($presse->url);
        return redirect('admin/presse')->withInput()->with('message', 'Nouvel article de presse ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->hasRole(Role::READ, 'presse')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $presse = Presse::find($id);
        if (!Presse::isValid(['id' => $id]) || $presse->actif == false) {
            return redirect()->back()->withInput()->with('error', 'Presse invalide');
        }
        if (Presse::find($id) == null) {
            return redirect()->back()->withInput()->with('error', 'Presse déjà introuvable');
        }
        $presse->url = urldecode($presse->url);
        return $presse;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasRole(Role::UPDATE, 'presse')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $presse = Presse::find($id);
        if (!$presse) {
            return redirect('presse');
        }
        $presse->first();
        $presse->url = urldecode($presse->url);
        return view('presse/edit', ['presse' => $presse]);
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
        if (!Auth::user()->hasRole(Role::UPDATE, 'presse')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $presse = Presse::find($id);
        $para = $request->intersect(['url', 'titreArticle', 'description', 'dateParution', 'nomPresse']);
        $request->replace(['id' => $id]);
        if (!Presse::isValid($para)) {
            return redirect()->back()->withInput()->withErrors('error', 'Presse invalide');
        }
        if (!Presse::isValid(['id' => $id]) || $presse->actif == false) {
            return redirect()->back()->withInput()->withErrors('error', 'Presse inexistante');
        }
        if ($request->has('url')) {
            $para['url'] = urlencode($para['url']);
        }
        $presse->update($para);
        $presse->url = urldecode($presse->url);
        return redirect('admin/presse')->withInput()->with('message', 'Modification enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasRole(Role::DELETE, 'presse')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $presse = Presse::find($id);

        if (!Presse::isValid(['id' => $id])) {
            return redirect()->back()->withInput()->with('error', 'Presse invalide');
        }
        if ($presse == null) {
            return redirect()->back()->withInput()->with('error', 'Presse introuvable');
        }
        if ($presse['actif'] == false) {
            return redirect()->back()->withInput()->with('error', 'Presse déjà supprimée');
        }
        foreach ($presse->editions as $ed){
            $presse->editions()->updateExistingPivot($ed->id, ['actif' => false]);
        }
        $presse->actif = false;
        $presse->save();
        return redirect('admin/presse')->withInput()->with('message', 'Presse supprimée');
    }
}
