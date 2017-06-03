<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ArticlePresse extends Model
{
    protected $fillable = ['url', 'titreArticle', 'description', 'dateParution', 'nomPresse'];
    protected $table = "articlepresses";

    public function editions() {
        return $this->belongsTo('\App\Edition');
    }

    public static function isValid($inputs) {
        return Validator::make($inputs, [
            'id' => 'exists:articlepresses|sometimes|required',
            'url' => 'url|sometimes|required',
            'titreArticle' => 'string|sometimes|required',
            'description' => 'string|sometimes|required',
            'dateParution' => 'date|sometimes|required',
            'nomPresse' => 'string|sometimes|required',
        ])->passes();
    }
}
