<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_client';

    public function suiviclient()
    {
        return $this->belongsTo('App\suiviclient');
    } 
    public function rapportnc()
    {
        return $this->belongsTo('App\rapportnc');
    }
    public function Dmpp()
    {
        return $this->belongsTo('App\Dmpp');
    } 
    public function supercontrole()
    {
        return $this->belongsTo('App\supercontrole');
    } 
}
