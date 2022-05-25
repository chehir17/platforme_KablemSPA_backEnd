<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ligne extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_ligne';

    public function Dmpp()
    {
        return $this->belongsTo('App\Dmpp');
    }  
    public function scrap()
    {
        return $this->belongsTo('App\scrap');
    }  
}
