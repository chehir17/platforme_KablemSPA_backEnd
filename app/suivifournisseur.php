<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suivifournisseur extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_suivifournisseur';

 public function article()
    {
        return $this->hasOne('App\article');
    } 
 public function Planaction()
    {
        return $this->belongsTo('App\Planaction');
    } 
    public function fournisseur()
    {
        return $this->hasOne('App\fournisseur');
    } 
    public function suiviclient()
    {
        return $this->belongsTo('App\suiviclient');
    } 
}
