<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SaleProduct;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buy (Request $request) {

        $sale = new Sale();
        $sale->subtotal = $request->total;
        $sale->total = $request->total;
        $sale->user_id = Auth::user()->id;

        $sale->save();

        $this->setSaleProduct();
        return redirect('/');
    }

    public function setSaleProduct(){
        $latestSale = DB::table('sales')
                ->orderBy('id', 'desc')
                ->limit(1)
                ->get();

        $sale_product = new SaleProduct();
        $items = Cart::getContent();
        // dd($sale_product);
        // dd($latestSale[0]->id);
        foreach($items as $row) {
            $sale_product->updateOrCreate([
                'sale_id' => $latestSale[0]->id,
                'product_id' => $row->id,
                'product_quantity' => $row->quantity,
                'user_id' => Auth::user()->id

            ]);
        }
        Cart::clear();
    }
}
