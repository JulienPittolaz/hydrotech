<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Validator;

class Edition extends Model
{
    protected $fillable = ['annee', 'nomEquipe', 'urlImageMedia', 'urlImageEquipe', 'lieu', 'dateDebut', 'dateFin', 'description', 'publie'];
    protected $hidden = ['actif'];
    //protected $table = "editions";

    public function membres() {
        return $this->belongsToMany('\App\Membre')->withTimestamps()->withPivot('actif');
    }

    public function actualites() {
        return $this->belongsToMany('\App\Actualite')->withTimestamps()->withPivot('actif');
    }

    public function medias() {
        return $this->belongsToMany('\App\Media')->withTimestamps()->withPivot('actif');
    }
    public function sponsors() {
        return $this->belongsToMany('\App\Sponsor')->withTimestamps()->withPivot('actif');
    }

    public function categorieeditionsponsors()
    {
        return $this->hasMany('App\Categorieeditionsponsor');
    }

    public function prixs() {
        return $this->belongsToMany('\App\Prix')->withTimestamps()->withPivot('actif');
    }

    public function presses() {
        return $this->belongsToMany('\App\Presse')->withTimestamps()->withPivot('actif');
    }


    public static function isValid($inputs) {
        $id = Input::input('id', null);
        return Validator::make($inputs, [
            'id' => 'exists:editions|sometimes|required',
            'annee' => ['integer', 'sometimes', 'required', 'digits:4', Rule::unique('editions')->ignore($id)],
            'nomEquipe' => 'string|sometimes|required',
            'urlImageMedia' => 'mimes:jpeg|sometimes|required',
            'urlImageEquipe' => 'mimes:jpeg|sometimes|required',
            'lieu' => 'string|sometimes|required',
            'dateDebut' => 'date|sometimes|required|before_or_equal:dateFin',
            'dateFin' => 'date|sometimes|required|after_or_equal:dateDebut',
            'description' => 'string|sometimes|required',
            'publie' => 'boolean|sometimes|required'
        ])->passes();

    }
}
