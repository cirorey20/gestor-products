<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.index', ['product' => $products]);
    }

    public function create() {
        return view('admin.create');
    }

    public function new(Request $request) {
        $pro = new ProductController();
        $pro->create($request->all());

        return redirect('/admin-index');
    }

    public function delete($id) {
        //
        $product = Product::find($id);
        if($product){
            $product->delete();
        }
        return back();//vuelve a la pagina anterior
    }

    public function edit($id)
    {
        $edit = Product::find($id); //find = id
        
        return view('admin.edit', compact('edit')); //compact trae los datos de la DB a el 
    }

    public function update(Request $request, $id){
        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->quantity = $request->input('quantity');
        $product->upc = $request->input('upc');

        $product->save();

        return redirect('/admin-index');

    }
}
