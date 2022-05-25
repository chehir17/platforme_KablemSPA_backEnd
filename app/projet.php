<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projet extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_projet';

    public function suiviclient()
    {
        return $this->belongsTo('App\suiviclient');
    } }
