<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $fillable = [
        'id',
        'sale_id',
        'product_id',
        'product_quantity',
        'user_id',
    ];
    // public function sales()
    // {
    //     return $this->belongsTo('App\Sale');
    // }
}
