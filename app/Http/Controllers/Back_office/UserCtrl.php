<?php

namespace App\Http\Controllers\Back_office;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $para = $request->only(['name', 'email', 'password', 'password2']);
        if (!User::isValid($para)) {
            return redirect()->back()->withInput()->with('error', 'User invalide');
        }
        $para['password'] = bcrypt($para['password']);
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

        $user = User::find($id);
        $para = $request->intersect(['name', 'email', 'password', 'password2']);
        //dd($request);
        if (!Hash::check($para['password'], $user->password)){
            return redirect()->back()->withInput()->with('error', 'Le password n\'est pas le bon');
        }
        $para['password'] = bcrypt($para['password']);

        if($para['password2'] != null){
            $para['password'] = bcrypt($para['password2']);
        }
        if (!User::isValid($para)) {
            return redirect()->back()->withInput()->with('error', 'User non valide');
        }
        if (!User::isValid(['id' => $id]) || $user->actif == false) {
            return redirect()->back()->withInput()->with('error', 'User inexistant');
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
        $user->actif = false;
        $user->save();
        return redirect('admin/user')->withInput()->with('message', 'User supprimé');
    }
}
