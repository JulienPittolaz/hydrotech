<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{



    public function groupes()
    {
        return $this->belongsToMany('App\Groupe')
            ->withTimestamps()
            ->withPivot('role');
    }

}
