<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class operateur extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_operateur';

    public function scrap()
    {
        return $this->belongsTo('App\scrap');
    }  
    public function User()
    {
        return $this->belongsTo('App\User');
    } 
}
