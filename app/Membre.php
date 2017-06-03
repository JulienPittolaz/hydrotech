<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Membre extends Model
{
    protected $fillable = ['adresseMail', 'nom', 'prenom', 'dateNaissance', 'section', 'description', 'photoProfil', 'role'];

    public function editions() {
        return $this->belongsToMany('\App\Edition');
    }

    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:membres|sometimes|required',
            'adresseMail' => 'email|sometimes|required',
            'nom' => 'string|sometimes|required',
            'prenom' => 'string|sometimes|required',
            'dateNaissance' => 'date|sometimes|required',
            'section' => 'string|sometimes|required',
            'description' => 'string|sometimes|required',
            'photoProfil' => 'url|sometimes|required',
            'role' => 'string|sometimes|required',
        ])->passes();
    }
}
