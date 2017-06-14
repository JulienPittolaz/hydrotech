<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Http\Request;

class Presse extends Model
{
    protected $fillable = [ 'dateParution', 'titreArticle', 'description', 'nomPresse', 'url'];
    protected $hidden = ['actif'];
    //protected $table = "presses";

    public function editions() {
        return $this->belongsToMany('\App\Edition')->withTimestamps()->withPivot('actif');
    }

    public static function isValid($inputs) {
        return Validator::make($inputs, [
            'id' => 'exists:presses|sometimes|required',
            'url' => 'url|sometimes|required',
            'titreArticle' => 'string|sometimes|required',
            'description' => 'string|sometimes|required',
            'dateParution' => 'date|sometimes|required|before_or_equal:today',
            'nomPresse' => 'string|sometimes|required',
        ])->passes();
    }

}
