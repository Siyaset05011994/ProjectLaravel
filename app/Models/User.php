<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';

    public $timestamps=false;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFillable()
    {
        return $this->fillable;
    }

    public function userDetail()
    {
        return $this->hasOne('App\Models\UserDetail','user_id','id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\Roles','role_id','id');
    }

    public function creator($creator)
    {
        return self::select('name')->where('id', $creator)->first();
    }



}
