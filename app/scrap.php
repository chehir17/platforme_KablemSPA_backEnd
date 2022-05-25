<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scrap extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_scrap';

    public function User()
    {
        return $this->hasOne('App\User');
    } 
    public function Planaction()
    {
        return $this->belongsTo('App\Planaction');
    } 
    public function operateur()
    {
        return $this->hasMany('App\operateur');
    } 
    public function odl()
    {
        return $this->hasOne('App\odl');
    } 
    public function lot()
    {
        return $this->hasOne('App\lot');
    } 
    public function ligne()
    {
        return $this->hasOne('App\ligne');
    } 
}
