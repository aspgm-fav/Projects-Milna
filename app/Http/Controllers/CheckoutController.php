<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Checkout;
use Auth;
use App\Feedback;
use App\Review;
use App\Product;
use App\User;
use Alert;
use App\Category;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $category = Category::all();
        $check = Cart::where(['user_id' => Auth::user()->id])->paginate(5);    
        $sort = $request->get('sortBy');
        if($sort == 'diterima'){
            $check = Cart::where(['user_id' => Auth::user()->id])
            ->where("status","LIKE","%$sort%")
            ->paginate(5);
        }
        if($sort == 'proses'){
            $check = Cart::where(['user_id' => Auth::user()->id])
            ->where("status","LIKE","%$sort%")
            ->paginate(5);
        }
        if($request->ajax()){
            return view('users.indexcheck',compact('check','category'))->renderSections()['content'];
        }
        return view('users.indexcheck',compact('check','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $cart = session()->get('cart');
        if($cart){
            return view('users.checkout',compact('category'));
        }else{
            return back()->with('errors',  Auth::user()->username. ' kamu harus belanja dulu');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cart = session()->get('cart');
        $totalprice = 0;
        foreach ($cart as $id => $product)  {
            $totalprice += $product['price'] * $product['quantity'];
        }
        // Get total price
        $order = new Cart();
        $order->user_id = Auth::user()->id;
        $order->name_receiver = $request->input('name_receiver');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->sub_district = $request->input('sub_district');
        $order->province = $request->input('province');
        $order->zip_code = $request->input('zip_code');
        $order->totalprice = $totalprice;
        $order->save();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $image->image = $file->getClientOriginalName();
                $product->image()->save($image);
                $file->move(public_path('images'), $image->image);
            }
        }
        foreach ($cart as $id => $product) {
            $totalStock = 0;
            $finalStock = 0;
            $totalStock = $product['stock'];
            $finalStock = $totalStock - $product['quantity'];
            $terjual = $product['sold_out'];
            $hasilTerjual = $terjual + $product['quantity'];
            $items = Product::findOrFail($id);
            $items->stock = $finalStock;
            $items->sold_out = $hasilTerjual; 
            $items->save();
        }

        // Save order item
        foreach ($cart as $id => $product) {
            $orderItem = new Checkout();
            $orderItem->cart_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $product['quantity'];
            $orderItem->price = $product['price'];
            $orderItem->save();
        }
        session()->forget('cart');
        return redirect('check')->with('success', Auth::user()->username.  ' barang sedang dikirim pelapak, tunggu barang nya sampai ya');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::all();
        $checkout = Cart::findOrFail($id);
        return view('users.showcheck',compact('checkout','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
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
            return view('users.checkout',compact('category'))->with('success', Auth::user()->username. ' isi alamat dengan lengkap ya');
        }
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return view('users.checkout',compact('category'))->with('success', Auth::user()->username. ' isi alamat dengan lengkap ya');
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
            return view('users.checkout',compact('category'))->with('success', Auth::user()->username. ' isi alamat dengan lengkap ya');
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
        $checkout = Cart::findOrFail($id);
        $checkout->status = $request->get('status');
        $checkout->save();
        return redirect('check')->with('success', Auth::user()->username. ' Kamu telah menerima barang, terima kasih sudah belanja'); 
        
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
    public function form($id){
        $orderItem = Checkout::findOrFail($id);
        return view('users.modalrating',compact('orderItem'));
    }
    public function ulas(Request $request)
    {
        $rating = new Review();
        $rating->user_id = Auth::user()->id;
        $rating->desc = $request->input('descrip');
        $rating->rating = $request->get('rating');
        $rating->save();
        $id = $request->input('id_product');
        $product = Product::findOrFail($id);
        $rating->product()->attach($product);
        $give_rating_id = $request->input('id');
        $check = Checkout::findOrFail($give_rating_id);
        $check->give_rating = $request->input('give_rating');
        $check->save();
        return back()->with('success', Auth::user()->username. ' kamu baru saja memberikan ulasan, yuk belanja lagi');
    }
}
