<?php

namespace App\Http\Controllers\Back_office;

use App\Presse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class PresseCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $presse = Presse::find($id);
        if (!Presse::isValid(['id' => $id]) || $presse->actif == false) {
            return response()->json('Presse non valide', Response::HTTP_BAD_REQUEST);
        }
        if (Presse::find($id) == null) {
            return response()->json('Presse introuvable', Response::HTTP_NOT_FOUND);
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
        $presse = Presse::find($id);
        $para = $request->intersect(['url', 'titreArticle', 'description', 'dateParution', 'nomPresse']);
        $request->replace(['id' => $id]);
        if (!Presse::isValid($para)) {
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }
        if (!Presse::isValid(['id' => $id]) || $presse->actif == false) {
            return response()->json('Presse inexistant', Response::HTTP_NOT_FOUND);
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
        $presse = Presse::find($id);

        if (!Presse::isValid(['id' => $id])) {
            return response()->json('Presse non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($presse == null) {
            return response()->json('Presse introuvable', Response::HTTP_NOT_FOUND);
        }
        if ($presse['actif'] == false) {
            return response()->json('Presse déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        $presse->actif = false;
        $presse->save();
        return redirect('admin/presse')->withInput()->with('message', 'Presse supprimée');
    }
}
