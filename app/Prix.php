<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Prix extends Model
{
    protected $fillable = ['nom', 'description', 'montant'];
    protected $hidden = ['actif'];
    protected $table = "prixs";

    public function editions() {
        return $this->belongsToMany('\App\Edition')->withTimestamps()->withPivot('actif');
    }

    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:prixs|sometimes|required',
            'nom' => 'string|sometimes|required|unique:prixs',
            'description' => 'string|sometimes|required',
            'montant' => 'numeric|min:0|sometimes|required'
        ])->passes();
    }
}
