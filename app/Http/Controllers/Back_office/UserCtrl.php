<?php

namespace App\Http\Controllers\Back_office;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class UserCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('actif', true);
        $user_columns = User::all()->first()['fillable'];
        return view('user/index', ['users' => $users, 'columns' => $user_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $para = $request->only(['name', 'email', 'password']);
        if (!User::isValid($para)) {
            return Redirect::back()->withErrors(['error', 'Invalide'])->withInput();
        }
        $user = new User($para);
        $user->save();
        return  redirect('admin/user')->withInput()->with('message', 'Nouvel user ajouté');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!User::isValid(['id' => $id]) || $user->actif == false) {
            return response()->json('User non valide', Response::HTTP_BAD_REQUEST);
        }
        if (User::find($id) == null) {
            return response()->json('User introuvable', Response::HTTP_NOT_FOUND);
        }
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(!$user) {
            return redirect('admin/user');
        }
        $user->first();
        return view('user/edit', ['user' => $user]);
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
        //Ca marche pas .... comment faire en sorte de chagner de mot de passe???????????
        $NoNewPassword = false;
        $user = User::find($id);
        if($request['password2'] == null){
            $NoNewPassword = true;
        }
        $para = $request->intersect(['name', 'email', 'password', 'password2']);
        if(!$NoNewPassword){
            $para['password'] = $para['password2'];
        }
        if (!User::isValid($para)) {
            return response()->json('User non valide', Response::HTTP_BAD_REQUEST);
        }
        if (!User::isValid(['id' => $id]) || $user->actif == false) {
            return response()->json('User inexistant', Response::HTTP_NOT_FOUND);
        }
        if($user['actif'] == false){
            return response()->json('User déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        $user->update($para);
        return redirect('admin/user')->withInput()->with('message', 'Modification enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!User::isValid(['id' => $id])) {
            return response()->json('User non valide', Response::HTTP_BAD_REQUEST);
        }
        if ($user == null) {
            return response()->json('User introuvable', Response::HTTP_NOT_FOUND);
        }
        if($user['actif'] == false){
            return response()->json('User déjà supprimé', Response::HTTP_NOT_FOUND);
        }
        $user->actif = false;
        $user->save();
        return response()->json('OK', Response::HTTP_OK);
    }
}
