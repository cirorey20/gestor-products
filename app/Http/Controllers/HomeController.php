<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Sale;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function isAdmin() {
        if ( Auth::user()->role == 'admin' ) {
            return redirect('/admin-index');
        } 
        else {
            return redirect('/client-index');
        }
    }
    public function index(){
        $sales = Sale::all()->where('user_id', Auth::user()->id);
        return view( 'client.index', ['sale' => $sales] );
    }

    public function showBuy($id){
        $sale = Sale::find($id)->where('user_id', Auth::user()->id);
        dd($sale);
        return view( 'client.shop', ['sale' => $sale] );
    }
}
