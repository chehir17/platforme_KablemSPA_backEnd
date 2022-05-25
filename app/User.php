<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'id_user';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','matricul','matricul','nature','role','id_departement','level','zone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notification()
    {
        return $this->hasMany('App\notification');
    }  
    public function scrap()
    {
        return $this->belongsTo('App\scrap');
    }  
    public function departement()
    {
        return $this->hasOne('App\departement');
    }  
    public function operateur()
    {
        return $this->hasMany('App\operateur');
    } 
     public function Planaction()
    {
        return $this->belongsTo('App\Planaction');
    }  
}
