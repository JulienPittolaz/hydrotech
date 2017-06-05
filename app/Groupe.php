<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

    protected $hidden = ['actif'];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function ressources()
    {
        return $this
            ->belongsToMany('App\Ressource')
            ->withTimestamps()
            ->withPivot('role');
    }

    public function hasRole($roleLabel, $ressourceLabel)
    {
        $ressources = $this->ressources()
            ->wherePivot('role', '=', $roleLabel)
            ->get();

        foreach ($ressources as $ressource) {
            if (strtolower($ressource->name) == strtolower($ressourceLabel)) {
                return true;
            }
        }
        return false;
    }

}
