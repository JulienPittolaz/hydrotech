<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Prix extends Model
{
    protected $fillable = ['nom', 'description', 'montant'];

    public function projects() {
        return $this->belongsToMany('\App\Edition');
    }

    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:prixs|sometimes|required',
            'nom' => 'string|sometimes|required',
            'description' => 'string|sometimes|required',
            'montant' => 'float|min:0|sometimes|required'
        ])->passes();
    }
}
