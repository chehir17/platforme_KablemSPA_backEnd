<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dmpp extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_dmpp';


    public function client()
    {
        return $this->hasOne('App\client');
    }  
    public function article()
    {
        return $this->hasOne('App\article');
    } 
    public function Planaction()
    {
        return $this->belongsTo('App\Planaction');
    } 
    public function ligne()
    {
        return $this->hasOne('App\ligne');
    } 
}
