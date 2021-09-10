<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    //
    
    protected $table = "products";

    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }
}
