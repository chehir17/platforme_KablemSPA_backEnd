<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supercontrole extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_supercontrole';


    public function article()
    {
        return $this->hasOne('App\article');
    } 
public function Planaction()
    {
        return $this->belongsTo('App\Planaction');
    } 
    public function client()
    {
        return $this->hasOne('App\client');
    } 
}
