<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id',
        'subtotal',
        'total',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sales_products()
    {
        return $this->hasMany('App\SaleProduct');
    }

    //relacion muchos a muchos
    public function products(){
        // return $this->belongsToMany('App\Product'); 
        return $this->hasMany('App\Product');
    }
}
