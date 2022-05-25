<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lot extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_lot';

    public function article()
    {
        return $this->belongsTo('App\article');
    }  
    public function scrap()
    {
        return $this->belongsTo('App\scrap');
    }  
}
