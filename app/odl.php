<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class odl extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_odl';

    public function scrap()
    {
        return $this->belongsTo('App\scrap');
    }  
}
