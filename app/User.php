<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'actif'
    ];

    public function groupes()
    {
        return $this->belongsToMany('App\Groupe')->withTimestamps();
    }

    public function hasRole($roleLabel, $ressourceLabel)
    {

        foreach ($this->groupes as $groupe) {
            if ($groupe->hasRole($roleLabel, $ressourceLabel)) {
                return true;
            }
        }
        return false;
    }


    public static function isValid($data = array()) {
        return Validator::make($data, [
            'id' => 'exists:users|sometimes|required',
            'adresseMail' => 'unique:users|email|sometimes|required',
            'password' => 'string|sometimes|required',
            'name' => 'string|sometimes|required',
        ])->passes();
    }
}
