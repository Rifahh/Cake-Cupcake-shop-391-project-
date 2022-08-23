<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProjectController extends Controller
{
    function index()
    {
        return view('index');
    }

    function products()
    {
        $cakes = DB::table('products')->where('category', 'cakes')->get();
        $cupcakes = DB::table('products')->where('category', 'cupcakes')->get();
        return view('products', ['cakes' => $cakes, 'cupcakes' => $cupcakes]);
    }

    function single_product(Request $request, $id)
    {
        // $product_array = DB::table('products')->where('id', $id)->get(); //arrayOfOneObj
        $product_array = Product::where('id', $id)->get(); //arrayOfOneObj
        return view('single_product', ['product_array' => $product_array]);
    }
}
