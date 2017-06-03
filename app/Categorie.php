<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Categorie extends Model
{
    protected $fillable = ['nom', 'description'];
    //protected $table = "categories";


    public function sponsors()
    {
        return $this->belongsToMany('App\Sponsor')->withTimestamps();
    }

    public function editions()
    {
        return $this->belongsToMany('App\Edition')->withTimestamps();
    }

    public static function isValid($data = array()){
        return Validator::make($data, [
            'id' => 'exists:categories|sometimes|required',
            'nom'   => 'string|sometimes|required',
            'description'    => 'string|sometimes|required',
        ])->passes();
    }
}
