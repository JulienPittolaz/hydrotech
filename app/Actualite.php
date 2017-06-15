<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Actualite extends Model
{
    protected $fillable = ['titre', 'datePublication', 'contenu', 'auteur', 'publie', 'urlImage'];
    protected $hidden = ['actif'];
    //protected $table = "actualites";

    public function editions() {
        return $this->belongsToMany('\App\Edition')->withTimestamps()->withPivot('actif');
    }

    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:actualites|sometimes|required',
            'titre' => 'string|sometimes|required',
            'datePubliation' => 'date|sometimes|required|after_or_equal:dateCreation',
            'dateCreation' => 'date|sometimes|required|before_or_equal:dateModification|before_or_equal:datePubliation',
            'contenu' => 'string|sometimes|required',
            'dateModification' => 'date|sometimes|required|after_or_equal:dateCreation',
            'auteur' => 'string|sometimes|required',
            'publie' => 'boolean|sometimes|required',
            'urlImage' => 'string|sometimes|required',
        ])->passes();
    }
}
