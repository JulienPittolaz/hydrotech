<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieSponsor extends Model
{
    protected $fillable = ['nom', 'description'];



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
            'id' => 'exists:categorieSponsors|sometimes|required',
            'nom'   => 'string|sometimes|required',
            'description'    => 'string|sometimes|required',
        ])->passes();
    }
}
