<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class action_immed extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_actionimmed';

    public function rapportnc()
    {
        return $this->belongsTo('App\rapportnc');
    }

    
}
