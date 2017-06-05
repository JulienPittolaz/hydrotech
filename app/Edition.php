<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Edition extends Model
{
    protected $fillable = ['annee', 'nomEquipe', 'urlImageMedia', 'urlImageEquipe', 'lieu', 'dateDebut', 'dateFin', 'description', 'publie'];
    protected $hidden = ['actif'];
    //protected $table = "editions";

    public function membres() {
        return $this->belongsToMany('\App\Membre')->withTimestamps();
    }

    public function actualites() {
        return $this->belongsToMany('\App\Actualite')->withTimestamps();
    }

    public function medias() {
        return $this->belongsToMany('\App\Media')->withTimestamps();
    }
    public function socials() {
        return $this->belongsToMany('\App\Social')->withTimestamps();
    }
    public function sponsors() {
        return $this->belongsToMany('\App\Sponsor')->withTimestamps();
    }

    public function categorieeditionsponsors()
    {
        return $this->hasMany('App\Categorieeditionsponsor');
    }

    public function prixs() {
        return $this->belongsToMany('\App\Prix')->withTimestamps();
    }

    public function presses() {
        return $this->belongsToMany('\App\Presse')->withTimestamps();
    }


    public static function isValid($inputs) {
        return Validator::make($inputs, [
            'id' => 'exists:editions|sometimes|required',
            'annee' => 'unique:editions|integer|digits:4|sometimes|required',
            'nomEquipe' => 'string|sometimes|required',
            'urlImageMedia' => 'url|sometimes|required',
            'urlImageEquipe' => 'url|sometimes|required',
            'lieu' => 'string|sometimes|required',
            'dateDebut' => 'date|sometimes|required|before_or_equal:dateFin',
            'dateFin' => 'date|sometimes|required|after_or_equal:dateDebut',
            'description' => 'string|sometimes|required',
            'publie' => 'boolean|sometimes|required'
        ])->passes();
    }
}
