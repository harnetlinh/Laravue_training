<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $primaryKey = 'store_id';
    protected $fillable = [
        'name', 'type_id', 'user_id',
    ];
    public function producttype()
    {
        return $this->hasOne('App\producttype');
    }
    public function product()
    {
        return $this->hasMany('App\product');
    }
}
