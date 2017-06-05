<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorieeditionsponsor extends Model
{
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
    public function edition()
    {
        return $this->belongsTo('App\Edition');
    }
    public function sponsor()
    {
        return $this->belongsTo('App\Sponsor');
    }
}
