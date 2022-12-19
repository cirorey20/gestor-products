<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'price',
        'sale',
        'quantity',
        'upc'
    ];

    protected function getProducts(){
        return Product::all();
    }
    protected function productById($id){
        return Product::find($id);
    }
    protected function latestProduct(){
        $latestProduct = DB::table('products')
                ->orderBy('upc', 'desc')
                ->limit(1)
                ->get();

        return $latestProduct[0];
    }

    protected function newProduct($product){

        $newProduct = new Product();
        
        $newProduct->name = $product['name'];
        $newProduct->price = $product['price'];
        $newProduct->quantity = $product['quantity'];
        
        if( !$this->productById(1) ){
            $newProduct->upc = 100000;
        } else {
            $upc = 1 + $this->latestProduct()->upc;
            $newProduct->upc = $upc;
        }

        $newProduct->save();

    }


}
