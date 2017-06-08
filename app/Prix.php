<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Validation\Rule;

class Prix extends Model
{
    protected $fillable = ['nom', 'description', 'montant'];
    protected $hidden = ['actif'];
    protected $table = "prixs";

    public function editions() {
        return $this->belongsToMany('\App\Edition')->withTimestamps()->withPivot('actif');
    }

    public static function isValid($data = array()) {
        $id = Input::input('id', null);
        return Validator::make($data, [
            'id' => 'exists:prixs|sometimes|required',
            'nom' => ['string',
                'sometimes',
                'required',
                Rule::unique('prixs')->ignore($id)
                ],
            'description' => 'string|sometimes|required',
            'montant' => 'numeric|min:0|sometimes|required'
        ])->passes();
    }
}
