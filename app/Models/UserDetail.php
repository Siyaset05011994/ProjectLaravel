<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table='user_detail';

    public function users()
    {
        return $this->belongsTo('App\Models\User','creator','id');
    }
}
