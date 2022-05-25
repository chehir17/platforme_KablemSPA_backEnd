<?php

namespace App;
use App\Action;
use Illuminate\Database\Eloquent\Model;

class Planaction extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_planaction';


    public function suiviclient()
    {
        return $this->hasOne('App\suiviclient');
    } 
    public function rapportnc()
    {
        return $this->hasOne('App\rapportnc');
    } 
    public function scrap()
    {
        return $this->hasOne('App\scrap');
    } 
    public function supercontrole()
    {
        return $this->hasOne('App\supercontrole');
    } 
    public function suivifournisseur()
    {
        return $this->hasOne('App\suivifournisseur');
    } 
    public function Dmpp()
    {
        return $this->hasOne('App\Dmpp');
    } 
    public function User()
    {
        return $this->hasOne('App\User');
    } 
    public function action()
    {
        return $this->hasMany('App\action');
    } 
  
}
