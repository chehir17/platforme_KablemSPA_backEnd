<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo_nc extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_photo_nc';

    public function rapportnc()
    {
        return $this->belongsTo('App\rapportnc');
    }}
