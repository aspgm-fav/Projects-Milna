<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Checkout;
use Auth;
use App\Category;
use App\Review;
use Illuminate\Support\Facades\Validator;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $category = Category::all();
        $filterKeyword = $request->get('title');
        $status = $request->get('status');
        $sort = $request->get("sort");
        if($status){ 
            $product = Product::where(['user_id' => Auth::user()->id])->where('title', "LIKE", "%$filterKeyword%")->where('status', strtoupper($status))->paginate(6);
        } else {
            $product = Product::where(['user_id' => Auth::user()->id])->where("title", "LIKE", "%$filterKeyword%")->paginate(6);
        }
        if($sort == 'termahal'){
            $product = Product::where(['user_id'=>Auth::user()->id])->orderBy("price","desc","%$sort%")->paginate(6);
        }elseif($sort == 'termurah'){
            $product = Product::where(['user_id'=>Auth::user()->id])->orderBy("price","asc","%$sort%")->paginate(6);
        }elseif($sort == 'terbaru'){
            $product = Product::where(['user_id'=>Auth::user()->id])->orderBy("created_at","desc","%$sort%")->paginate(6);
        }elseif($sort == 'terlaris'){
            $product = Product::where(['user_id'=>Auth::user()->id])->orderBy("sold_out","desc","%$sort%")->paginate(6);
        }elseif($sort == 'terbaik'){
            $product = Product::withCount('review')->orderBy('review_count', 'desc')->where(['user_id'=>Auth::user()->id])->paginate(6); 
        }
        elseif($sort == 'look'){
            $product = Product::where(['user_id'=>Auth::user()->id])->orderBy("look","desc","%$sort%")->paginate(6);
        }
        elseif($sort == 'stock'){
            $product = Product::where(['user_id'=>Auth::user()->id])->orderBy("stock","desc","%$sort%")->paginate(6);
        }
        if($request->ajax()){
            return view('products.index',compact('product','category'))->renderSections()['content'];
        }else{
            return view('products.index',compact('product','category'));
        }        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**1
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $product= new Product();
        $product->user_id = Auth::user()->id;
        $product->description = $request->get('description');
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->weight = $request->input('weight');
        $product->condition = $request->input('condition');
        $product->status = $request->get('save_action');
        $product->save();
        $id = $request->input('categories');
        $category = Category::findOrFail($id);
        $product->category()->attach($category);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $image->image = $file->getClientOriginalName();
                $product->image()->save($image);
                $file->move(public_path('images'), $image->image);
            }
        }
        if($request->get('save_action') == 'dijual'){
            Alert::success('Produk berhasil ditambahkan');
            return back()->with('success', Auth::user()->username. ' produk kamu sudah ditambahkan');
            } else {
            return back( )->with('success', Auth::user()->username. ' produk disimpan ke draft');
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->look += 1;
        $product->save();
        $category = Category::all();
        $qty = Checkout::where(['product_id' => $id])->sum('quantity');
        if($request->ajax()){
            return view('products.show', compact('product','category','qty'))->renderSections()['content'];
        }else{
            return view('products.show', compact('product','category','qty'));
        }
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
        $product= Product::findOrFail($id);
        return view('products.edit',compact('category','product'));
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
        $product = Product::findOrFail($id);
        $product->description = $request->input('description');
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->weight = $request->input('weight');
        $product->condition = $request->input('condition');
        $product->status = $request->get('save_action');
        $id = $request->input('categories');
        $product->category()->sync($request->input('categories'));
        
        $product->save();
        if ($request->hasFile('image')) {
            $product->image()->delete();
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $image->image = $file->getClientOriginalName();
                $product->image()->save($image);
                $file->move(public_path().'/images', $image->image);
            }
        }
        Alert::success('Produk telah diperbarui');
        return redirect('product')->with('success', Auth::user()->username. ' produk kamu baru saja diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request){
        $category = Category::all();
        $deleted_product = Product::onlyTrashed()->where(['user_id' => Auth::user()->id])->paginate(6);
        $search = $request->get('title');

        if($search){
            $deleted_product = Product::onlyTrashed()
            ->where("title","LIKE","%$search%")
            ->where(['user_id' => Auth::user()->id])
            ->paginate(6);    
        }
        if($request->ajax()){
            return view('products.notsale',compact('deleted_product','category'))->renderSections()['content'];
        }else{
            return view('products.notsale',compact('deleted_product','category'));
        }
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('info',Auth::user()->username.  ' produk kamu tidak dijual');
    }
    public function restore($id){
        $product = Product::withTrashed()->findOrFail($id);
        if($product->trashed()){
          $product->restore();
        } else {
          return back()->with('info', Auth::user()->username. ' produk kamu dijual');
        }
        return back()->with('info', Auth::user()->username. ' produk kamu dijual');
    }

    public function deletePermanent($id){
        $product = Product::withTrashed()->findOrFail($id);
        if(!$product->trashed()){
          return back()->with('success', Auth::user()->username. ' produk yang ada di draft sudah dihapus');
        } else {
          $product->forceDelete();
          return back()->with('success', Auth::user()->username. ' produk kamu telah dihapus');
        }
    }
    public function selectAll(Request $request){
        $checked = $request->checked;
        Product::whereIn('id',explode(",",$checked))->delete();
        return response()->json(['status'=>true,'message'=> Auth::user()->username. " produk kamu tidak dijual."]);   
        // $checked = $request->get('checked',[]);
        // Product::whereIn('id', $checked)->delete(); 
        // return back()->with('info', Auth::user()->username. ' produk kamu tidak dijual');
    }
    public function selectAllre(Request $request){
        $checked = $request->checked;
        Product::whereIn('id',explode(",",$checked))->restore();
        return response()->json(['status'=>true,'message'=> Auth::user()->username. " produk kamu dijual."]);   

        // $checked = $request->get('checked',[]);
        // Product::whereIn('id', $checked)->restore(); 
        // return back()->with('info', Auth::user()->username. ' produk kamu dijual');
    }
    public function review(Request $request){
        $rating = new Review();
        $rating->user_id = Auth::user()->id;
        $rating->rating = $request->get('rating');
        $rating->desc = $request->get('desc');
        $rating->save();
        $rating->product()->attach($request->input('product_id'));
        return back()->with("success", "kamu baru saja mengulas barang ini, Terima Kasih Ya");
    }
}
