<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Product;
use Alert;
use Auth;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $category = \App\Category::all();
        return view('users.cart',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
        
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('image')->find($id);

        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                    $id => [
                        "sold_out" => $product->sold_out,
                        "stock" => $product->stock,
                        "name" => $product->title,
                        "pay" => $product->user->pay,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image_url" => $product->image()->first()->image
                    ]
            ];
            session()->put('cart', $cart);
            session()->flash('success', ' Produk berhasil ditambahkan ke keranjang');
            return back();
        }
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            session()->flash('success', ' Produk berhasil ditambahkan ke keranjang');
            return back();
        }
        $cart[$id] = [
            "sold_out" => $product->sold_out,
            "stock" => $product->stock,
            "name" => $product->title,
            "pay" => $product->user->pay,
            "quantity" => 1,
            "price" => $product->price,
            "image_url" => $product->image()->first()->image
            ];

            session()->put('cart', $cart);
            session()->flash('success', ' Produk berhasil ditambahkan ke keranjang kamu');
            return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function remove(Request $request)
    {
        if($request->ajax($request->id)) {
            $cart = session()->get('cart');
            unset($cart[$request->id]);
            $request->session()->put('cart', $cart);
        }
    }
}