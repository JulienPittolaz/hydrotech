<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ReseauSocial extends Model
{
    protected $fillable = ['nom', 'url'];

    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:reseauSocials|sometimes|required',
            'nom' => 'string|sometimes|required',
            'url' => 'url|sometimes|required',
        ])->passes();
    }
}
