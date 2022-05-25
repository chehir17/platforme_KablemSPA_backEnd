<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rapportnc extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_rapportnc';

    public function ac_ap()
    {
        return $this->hasMany('App\ac_ap');
    } 

    public function action_immed()
    {
        return $this->hasOne('App\action_immed');
    } 
    public function photo_nc()
    {
        return $this->hasOne('App\photo_nc');
    }
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
}
