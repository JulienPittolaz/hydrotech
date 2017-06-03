<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Media extends Model
{
    protected $fillable = ['url', 'titre', 'date', 'auteur', 'typeMedia'];

    public function editions() {
        return $this->belongsToMany('\App\Edition');
    }

    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:medias|sometimes|required',
            'url' => 'url|sometimes|required',
            'titre' => 'string|sometimes|required',
            'date' => 'date|sometimes|required',
            'auteur' => 'string|sometimes|required',
            'typeMedia' => [
                'sometimes',
                'required',
                'string',
                Rule::in(['Photo', 'photo', 'Video', 'video']),
            ],
        ])->passes();
    }
}
