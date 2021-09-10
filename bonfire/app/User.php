<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

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

    public function bills() {
        return $this->hasMany('App\Bills', 'id_user','id');
    }

    public function bill_detail() {
        return $this->hasManyThrough('App\BillDetail', 'App\Bills', 'id_user', 'id_bill', 'id');
    }
}
