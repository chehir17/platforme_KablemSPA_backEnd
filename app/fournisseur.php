<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_fournisseur';

    public function suivifournisseur()
    {
        return $this->belongsTo('App\suivifournisseur');
    }  
}
