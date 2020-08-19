<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInStore extends Model
{
    //
    protected $primaryKey = ['product_id','store_id'];
}
