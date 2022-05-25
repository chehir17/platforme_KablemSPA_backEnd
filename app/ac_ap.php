<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ac_ap extends Model
{
    protected $guarded = [];

    public function rapportnc()
    {
        return $this->belongsTo('App\rapportnc');
    }
}
