<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Validation\Rule;

class Media extends Model
{
    protected $fillable = ['titre', 'date', 'auteur', 'typeMedia', 'url'];
    protected $hidden = ['actif'];
    protected $table = "medias";

    public function editions()
    {
        return $this->belongsToMany('\App\Edition')->withTimestamps()->withPivot('actif');
    }

    public static function isValid($data = array())
    {
        $rules = [
            'id' => 'exists:medias|sometimes|required',
            'titre' => 'string|sometimes|required',
            'url' => 'sometimes|required',
            'date' => 'date|sometimes|required|before:tomorrow',
            'auteur' => 'string|sometimes|required',
            'typeMedia' => [
                'sometimes',
                'required',
                'string',
                Rule::in(['Photo', 'photo', 'Video', 'video']),
            ]];
        return Validator::make($data, $rules)->passes();
    }
}
