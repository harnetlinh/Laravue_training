<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $primaryKey = 'type_id';
    
    public function product()
    {
        return $this->hasMany('App\product');
    }
}
