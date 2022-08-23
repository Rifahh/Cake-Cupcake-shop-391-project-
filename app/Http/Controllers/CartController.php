<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Auth;

class CartController extends Controller
{
    //
    public function cart()
    {
        return view('cart');
    }

    public function add_to_cart(Request $request)
    {
        if (Auth::user()) {
            $product_check = Cart::where('product_id', $request->product_id)->first();
            if (!$product_check) {
                Cart::create([
                    'product_id' => $request->product_id,
                    'user_id' => Auth::user()->id,
                    'price' => $request->price,
                    'qty' => $request->qty,
                    'total_price' => $request->qty * $request->price,
                ]);
            }
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            return view('cart', compact('carts'));
        } else {
            return back()->with('message', 'Please login first!');
        }
    }
    public function plus_cart_item(Request $request)
    {
        $cart = Cart::where('id', $request->cart_id)->first();
        $cart->qty = $request->qty + 1;
        $cart->total_price = $cart->qty * $cart->price;
        $cart->save();
        $qty = Cart::where('id', $request->cart_id)->first();
        $result = array();
        $result['qty'] = view('ajax_cart', compact('qty'))->render();
        return $result;
    }
    public function minus_cart_item(Request $request)
    {
        $cart = Cart::where('id', $request->cart_id)->first();
        if ($cart->qty > 1) {
            $cart->qty = $request->qty - 1;
            $cart->total_price = $cart->qty * $cart->price;
            $cart->save();
            $qty = Cart::where('id', $request->cart_id)->first();
            $result = array();
            $result['qty'] = view('ajax_cart', compact('qty'))->render();
            return $result;
        }
    }

    function checkout(Request $request)
    {
        Cart::where('user_id', Auth::user()->id)->delete();
        foreach ($request->product_id as $key => $i) {
            Cart::create([
                'product_id' => $request->product_id[$key],
                'user_id' => Auth::user()->id,
                'price' => $request->price[$key],
                'qty' => $request->qty[$key],
                'total_price' => $request->qty[$key] * $request->price[$key],
            ]);
        }
        $all_carts = Cart::where('user_id', Auth::user()->id)->get();
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        return view('checkout', compact('all_carts', 'cart'));
    }

    function place_order(Request $request)
    {
        if (Auth::user()) {
            Cart::where('user_id', Auth::user()->id)->delete();
            foreach ($request->product_id as $key => $i) {
                Order::create([
                    'product_id' => $request->product_id[$key],
                    'user_id' => Auth::user()->id,
                    'price' => $request->price[$key],
                    'qty' => $request->qty[$key],
                    'total_price' => $request->qty[$key] * $request->price[$key],
                    'name' => $request->name,
                    'email' => $request->email,
                    'city' => $request->city,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'status' => 0,
                ]);
            }
            return redirect('/main/successlogin')->with('message', 'Your Order Successfully Placed');
        } else {
            return back();
        }
    }
}
