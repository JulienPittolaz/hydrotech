<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            return response()->json('User invalide', Response::HTTP_BAD_REQUEST);
        }
        $user = new User($para);
        $user->save();
        return  response()->json($user, Response::HTTP_CREATED);
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
        //
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
        $para = $request->intersect(['name', 'email', 'password']);
        if (!User::isValid($para)) {
            return response()->json('User non valide', Response::HTTP_BAD_REQUEST);
        }
        if (!User::isValid(['id' => $id]) || $user->actif == false) {
            return response()->json('User inexistant', Response::HTTP_NOT_FOUND);
        }
        $user->update($para);
        return response()->json($user, Response::HTTP_OK);
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
