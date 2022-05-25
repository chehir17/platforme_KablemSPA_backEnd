<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo_suivi_client extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_photoSuiviClients';

    public function suiviclient()
    {
        return $this->belongsTo('App\suiviclient');
    } 
}
