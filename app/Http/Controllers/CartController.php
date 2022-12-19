<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    public function index(){
        
        return view('Cart.index');

    }

    public function add(Request $request) {
        $product = Product::find($request->product_id);
            Cart::add(
                $product->id,
                $product->name,
                $product->price,
                1,
            );
        return redirect('/')->with('status', "$product->name se agregó al carrito");
    }

    public function decrement($id){
        //elimina una cantidad del producto si es que hay mas de uno
        Cart::update($id, array(
            
            'quantity' => -1, 
        ));
        return back();
    }

    public function increment($id){
        //elimina una cantidad del producto si es que hay mas de uno
        $product = Product::find($id);
        $cart = Cart::get($id);
        if( $product->quantity > $cart->quantity ) {
            Cart::update($id, array(
                
                'quantity' => 1, 
            ));
            return back();
        }
        return back();

    }

    public function delete($id){
        Cart::remove($id);
        return back()->with('success', "producto eliminado del carrito");
    }
}
