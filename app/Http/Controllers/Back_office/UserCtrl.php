<?php

namespace App\Http\Controllers\Back_office;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Auth;
use App\Role;

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
        if (!Auth::user()->hasRole(Role::READ, 'user')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        return view('user/index', ['users' => $users, 'columns' => $user_columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasRole(Role::CREATE, 'user')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
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
            return redirect()->back()->withInput()->with('error', 'User invalide');
        }
        if (!Auth::user()->hasRole(Role::CREATE, 'user')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
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
            return redirect()->back()->withInput()->with('error', 'User non valide');
        }
        if (User::find($id) == null) {
            return redirect()->back()->withInput()->with('error', 'User introuvable');
        }
        if (!Auth::user()->hasRole(Role::READ, 'user')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
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
        if (!Auth::user()->hasRole(Role::UPDATE, 'user')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
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
            return redirect()->back()->withInput()->with('error', 'User non valide');
        }
        if (!User::isValid(['id' => $id]) || $user->actif == false) {
            return redirect()->back()->withInput()->with('error', 'User inexistant');
        }
        if (!Auth::user()->hasRole(Role::UPDATE, 'user')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        if($user['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'User déjà supprimé');
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
            return redirect()->back()->withInput()->with('error', 'User introuvable');
        }
        if ($user == null) {
            redirect()->back()->withInput()->with('error', 'User introuvable');
        }
        if($user['actif'] == false){
            return redirect()->back()->withInput()->with('error', 'User déjà supprimé');
        }
        if (!Auth::user()->hasRole(Role::DELETE, 'user')) {
            return redirect()->back()->with('error', 'Pas les droits suffisants');
        }
        $user->actif = false;
        $user->save();
        return redirect('admin/user')->withInput()->with('message', 'User supprimé');
    }
}
