<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Social extends Model
{
    protected $fillable = ['nom', 'url'];
    //protected $table = "socials";

    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:socials|sometimes|required',
            'nom' => 'string|sometimes|required',
            'url' => 'url|sometimes|required',
        ])->passes();
    }
}
