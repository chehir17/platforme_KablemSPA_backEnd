<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_article';

    public function suiviclient()
    {
        return $this->belongsTo('App\suiviclient');
    } 
    public function lot()
    {
        return $this->hasMany('App\lot');
    } 
    public function rapportnc()
    {
        return $this->belongsTo('App\rapportnc');
    }
     public function supercontrole()
    {
        return $this->belongsTo('App\supercontrole');
    } 
    
    public function Dmpp()
    {
        return $this->belongsTo('App\Dmpp');
    } 

    public function suivifournisseur()
    {
        return $this->belongsTo('App\suivifournisseur');
    } 
}
