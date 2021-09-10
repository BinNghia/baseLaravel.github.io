<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetail extends Model
{
    //
    protected $table = "bill_detail";
    
      
    // Create Relationship
    public function bills(){
        return $this->belongsTo('App\Bills','id_bill','id');
    }

    public function products(){
        return $this->belongsTo('App\Products','id_product','id');
    }
}
