<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Presse extends Model
{
    protected $fillable = ['url', 'titreArticle', 'description', 'dateParution', 'nomPresse'];
    protected $hidden = ['actif'];
    //protected $table = "presses";

    public function editions() {
        return $this->belongsToMany('\App\Edition')->withTimestamps();
    }

    public static function isValid($inputs) {
        return Validator::make($inputs, [
            'id' => 'exists:presses|sometimes|required',
            'url' => 'url|sometimes|required',
            'titreArticle' => 'string|sometimes|required',
            'description' => 'string|sometimes|required',
            'dateParution' => 'date|sometimes|required|before:tomorrow',
            'nomPresse' => 'string|sometimes|required',
        ])->passes();
    }
}
