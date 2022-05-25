<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_notif';

    public function User()
    {
        return $this->belongsTo('App\User');
    }  
}
