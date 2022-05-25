<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_departement';

    public function User()
    {
        return $this->belongsTo('App\User');
    } 
    public function action()
    {
        return $this->belongsTo('App\action');
    } 
}
