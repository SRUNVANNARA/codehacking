<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'role_id', 'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role(){

        return $this->belongsTo('App\Role');

    }

    public function photo(){
        return  $this->belongsTo('App\Photo');
    }

    public  function isAdmin(){

        if($this->role->name=="Admin" && $this->is_active==1){

            return true;

        }

        return false;

    }

    public function posts(){

        return $this->hasMany('App\Post');

    }

}
