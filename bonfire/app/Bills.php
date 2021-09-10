<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bills extends Model
{
    //
    
    protected $table = "bills";
    
      
    // Create Relationship
    public function users(){
        return $this->belongsTo('App\User','id_user','id');
    }

    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_bill','id');
    }
}
