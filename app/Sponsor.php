<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Sponsor extends Model
{
    protected $fillable = ['nom', 'urlLogo', 'urlSponsor'];
    protected $hidden = ['actif'];
    //protected $table = "sponsors";



    public function categorieeditionsponsors()
    {
        return $this->hasMany('App\Categorieeditionsponsor');
    }

    
    public static function isValid($data = array()){
        return Validator::make($data, [
            'id' => 'exists:sponsors|sometimes|required',
            'nom'   => 'string|sometimes|required',
            'urlLogo'    => 'string|sometimes|required',
            'urlSponsor'    => 'url|sometimes|required',
        ])->passes();
    }
}
