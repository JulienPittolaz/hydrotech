<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = ['annee', 'nomEquipe', 'urlImageMedia', 'urlImageEquipe', 'lieu', 'dateDebut', 'dateFin', 'description'];
    protected $table = "editions";

    public function membres() {
        return $this->belongsToMany('\App\Membre');
    }

    public function actualites() {
        return $this->belongsToMany('\App\Actualite');
    }

    public function medias() {
        return $this->belongsToMany('\App\Media');
    }

    public function categorieSponsors() {
        return $this->belongsToMany('\App\CategorieSponsor');
    }

    public function prixs() {
        return $this->belongsToMany('\App\Prix');
    }

    public function articlepresses() {
        return $this->belongsToMany('\App\AcrticlePresse');
    }

    public static function isValid($inputs) {
        return Validator::make($inputs, [
            'id' => 'exists:editions|sometimes|required',
            'annee' => 'integer|digits:4|sometimes|required',
            'nomEquipe' => 'string|sometimes|required',
            'urlImageMedia' => 'url|sometimes|required',
            'urlImageEquipe' => 'url|sometimes|required',
            'lieu' => 'string|sometimes|required',
            'dateDebut' => 'date|sometimes|required|before_or_equal:dateFin',
            'dateFin' => 'date|sometimes|required|after_or_equal:dateDebut|before_or_equal:datePubliation',
            'description' => 'string|sometimes|required'
        ])->passes();
    }
}
