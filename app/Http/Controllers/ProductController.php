<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function getProducts(){
        return Product::getProducts();
    }

    public function productId($id){
        $rst = Product::productById($id);
        if (!$rst){
            return response(["message" => "Id does not exist"], 404);
        }
        return $rst;
    }

    public function create($product){
        if( !$product['name'] || !$product['price'] || !$product['quantity'] ) {
            return response(["message" => "Required Fields"], 428);
        }
        $newProduct = Product::newProduct($product);
        return response(["message" => "Product Created"], 201);
    }

    public function edit(Request $request, $id) {
        dd($request->all());
        return Product::find($id)->name;
    }


}
