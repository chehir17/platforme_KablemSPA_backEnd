<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suiviclient extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_suiviclient';


    public function article()
    {
        return $this->hasOne('App\article');
    } 
    public function projet()
    {
        return $this->hasOne('App\projet');
    } 
    public function photo_suivi_client()
    {
        return $this->hasOne('App\photo_suivi_client');
    } 
    public function Planaction()
    {
        return $this->belongsTo('App\Planaction');
    } 
    public function client()
    {
        return $this->hasOne('App\client');
    } 
    public function suivifournisseur()
    {
        return $this->hasOne('App\suivifournisseur');
    } 
}
