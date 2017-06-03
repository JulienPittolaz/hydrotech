<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Sponsor extends Model
{
    protected $fillable = ['nom', 'urlLogo', 'urlSponsor'];
    //protected $table = "sponsors";



    public function categories()
    {
        return $this->belongsToMany('App\Categorie')->withTimestamps();
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
