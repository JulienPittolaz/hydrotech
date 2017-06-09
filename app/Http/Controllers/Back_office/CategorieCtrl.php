<?php

namespace App\Http\Controllers\Back_office;

use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CategorieCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all()->where('actif', true);

        $categorie_columns = Categorie::all()->first()['fillable'];
        return view('categorie/index', ['categories' => $categories, 'columns' => $categorie_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only(['nom', 'description']);
        if (!Categorie::isValid($inputs)) {
            return response()->json('Categorie invalide', Response::HTTP_BAD_REQUEST);
        }

        $categorie = new Categorie([
            'nom' => $inputs['nom'],
            'description' => $inputs['description']
        ]);
        $categorie->save();
        return  redirect('admin/categorie')->withInput()->with('message', 'Nouvelle catégorie sponsor ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $categorie = Categorie::find($id);

        if (!Categorie::isValid(['id' => $id]) || $categorie->actif == false) {
            return response()->json('Requête invalide', Response::HTTP_NOT_FOUND);
        }
        if(Categorie::find($id) == null){
            return response()->json('Categorie introuvable', Response::HTTP_NOT_FOUND);
        }

        return $categorie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);
        if(!$categorie) {
            return redirect('admin/categorie');
        }
        $categorie->first();
        return view('categorie/edit', ['categorie' => $categorie]);
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
        $categorie = Categorie::find($id);

        $inputs = $request->intersect(['nom', 'description']);
        $request->replace(['id' => $id]);
        if (!Categorie::isValid($inputs)) {
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }
        if (!Categorie::isValid(['id' => $id]) || $categorie->actif == false) {
            return response()->json('Not found', Response::HTTP_NOT_FOUND);
        }

        if($categorie['actif'] == false){
            return response()->json('Categorie déjà supprimée', Response::HTTP_NOT_FOUND);
        }

        $categorie->update($inputs);
        return  redirect('admin/categorie')->withInput()->with('message', 'Modification enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);

        if (!Categorie::isValid(['id' => $id])) {
            return response()->json('Requête invalide', Response::HTTP_BAD_REQUEST);
        }
        if ($categorie == null) {
            return response()->json('Categorie introuvable', Response::HTTP_NOT_FOUND);
        }
        if($categorie['actif'] == false){
            return response()->json('Categorie déjà supprimée', Response::HTTP_NOT_FOUND);
        }
        $categorie->actif = false;
        $categorie->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}