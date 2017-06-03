<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Sponsor extends Model
{
    protected $fillable = ['nom', 'urlLogo', 'urlSponsor'];



    public function categorieSponsors()
    {
        return $this->belongsToMany('App\CategorieSponsor')->withTimestamps();
    }

    public static function isValid($data = array()){
        return Validator::make($data, [
            'id' => 'exists:sponsors|sometimes|required',
            'nom'   => 'string|sometimes|required',
            'urlLogo'    => 'url|sometimes|required',
            'urlSponsor'    => 'url|sometimes|required',
        ])->passes();
    }
}
