<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class action extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_action';


    public function Planaction()
    {
        return $this->belongsTo('App\Planaction');
    }
}
