<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = "customer";
    public  function bill(){
        return $this->hasMany('App\Bill','id_bill','id');
    }
}
