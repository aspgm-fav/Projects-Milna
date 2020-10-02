<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $category = \App\Category::all();

        $filterKeyword = $request->input('search') ? $request->input('search') : '';

        $categorysearch = $request->get('categorysearch') ? $request->get('categorysearch') : '';

        $sorting = $request->get('sorting') ? $request->get('sorting') : '';

        $product = Product::where(['status' => 'dijual'])->where('stock', '>', '0')->where("title", "LIKE", "%$filterKeyword%");

        if($categorysearch){
            $product = $product->with('category') ->whereHas('category', function($q) use ($categorysearch) {
                $q->where('category_id', $categorysearch);
            });
        }
        if($sorting == 'termahal'){
            $product = $product->orderBy("price","desc","%$sorting%");
        }
        if($sorting == 'termurah'){
            $product = $product->orderBy("price","asc","%$sorting%");
        }
        if($sorting == 'terbaru'){
            $product = $product->orderBy("created_at","desc","%$sorting%");
        }
        if($sorting == 'terbaik'){
            $product = $product->withCount('review')->orderBy("review_count", "desc","%$sorting%");
        }
        if($sorting == 'terlaris'){
            $product = $product->orderBy("sold_out","desc","%$sorting%");
        }
        if($sorting == 'look'){
            $product = $product->orderBy("look","desc","%$sorting%");
        }

        $product = $product->paginate(18);

        if($request->ajax()){
            return view('milna', compact('product','category'))->renderSections()['content'];
        }else{
            return view('milna', compact('product','category'));
        }
    }
}
