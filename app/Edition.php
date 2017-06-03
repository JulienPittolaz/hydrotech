<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = ['annee', 'nomEquipe', 'urlImageMedia', 'urlImageEquipe', 'lieu', 'dateDebut', 'dateFin', 'description'];

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
            'annee' => 'integer||sometimes|required',
            'nomEquipe' => 'boolean|sometimes|required',
            'urlImageMedia' => 'integer|min:1|max:3|sometimes|required',
            'urlImageEquipe' => 'exists: projects,id|sometimes|required',
            'lieu' => 'exists: projects,id|sometimes|required',
            'dateDebut' => 'exists: projects,id|sometimes|required',
            'dateFin' => 'exists: projects,id|sometimes|required',
            'description' => 'exists: projects,id|sometimes|required'
        ])->passes();
    }
}
