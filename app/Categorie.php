<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Categorie extends Model
{
    protected $fillable = ['nom', 'description'];
    protected $hidden = ['actif'];
    //protected $table = "categories";


    public function categorieeditionsponsors()
    {
        return $this->hasMany('App\Categorieeditionsponsor')->withTimestamps();
    }


    public static function isValid($data = array()){
        return Validator::make($data, [
            'id' => 'exists:categories|sometimes|required',
            'nom'   => 'string|sometimes|required',
            'description'    => 'string|sometimes|required',
        ])->passes();
    }
}
