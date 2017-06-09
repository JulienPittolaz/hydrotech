<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Validation\Rule;

class Media extends Model
{
    protected $fillable = ['url', 'titre', 'date', 'auteur', 'typeMedia'];
    protected $hidden = ['actif'];
    protected $table = "medias";

    public function editions() {
        return $this->belongsToMany('\App\Edition')->withTimestamps();
    }

    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:medias|sometimes|required',
            'url' => 'url|sometimes|required',
            'titre' => 'string|sometimes|required',
            'date' => 'date|sometimes|required|before:tomorrow',
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
