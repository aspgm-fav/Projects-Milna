<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Product;
use App\Image;
use Illuminate\Http\Request;
Route::get('/', function (Request $request) {
    $category = \App\Category::all();
    $product = Product::where(['status' => 'dijual'])->where('stock', '>', '0')->paginate(18);    
    $filterKeyword = $request->input('search');
        if($filterKeyword){
            $product = Product::where(['status' => 'dijual'])
            ->where('stock', '>', '0')
            ->where("title", "LIKE", "%$filterKeyword%")
            ->paginate(18);
        }
    $categorysearch = $request->get('categorysearch');
    $sorting = $request->get('sorting');
    if($categorysearch){
        $product = Product::with('category') ->whereHas('category', function($q) use ($categorysearch) {
            $q->where('category_id', $categorysearch);
        })->paginate(18);
    }elseif($sorting == 'termahal'){
            $product = Product::where(['status' => 'dijual'])
            ->where('stock', '>', '0')
            ->orderBy("price","desc","%$sorting%")->paginate(18);
        }elseif($sorting == 'termurah'){
            $product = Product::where(['status' => 'dijual'])
            ->where('stock', '>', '0')
            ->orderBy("price","asc","%$sorting%")->paginate(18);
        }elseif($sorting == 'terbaru'){
            $product = Product::where(['status' => 'dijual'])
            ->where('stock', '>', '0')
            ->orderBy("created_at","desc","%$sorting%")->paginate(18);
        }elseif($sorting == 'terbaik'){
            $product = Product::where(['status' => 'dijual'])
            ->where('stock', '>', '0')
            ->withCount('review')->orderBy("review_count", "desc","%$sorting%")->paginate(18); 
        }elseif($sorting == 'terlaris'){
            $product = Product::where(['status' => 'dijual'])
            ->where('stock', '>', '0')
            ->orderBy("sold_out","desc","%$sorting%")->paginate(18);
        }elseif($sorting == 'look'){
            $product = Product::where(['status' => 'dijual'])
            ->where('stock', '>', '0')
            ->orderBy("look","desc","%$sorting%")->paginate(18);
        }
    if($request->ajax()){
        return view('milna', compact('product','category'))->renderSections()['content'];
    }else{
        return view('milna', compact('product','category'));
    }
});

Auth::routes(['verify' => true]);
Route::get('verifikasi', 'UserController@auth')->name('verifikasi');
Route::get('akun','UserController@ringks')->name('ringksn');
Route::get('product','ProductController@index')->name('product.index');
Route::post('product','ProductController@store')->name('product.store');
Route::get('product/{id}','ProductController@edit')->name('product.edit');
Route::put('product/{id}/update','ProductController@update')->name('product.update');
Route::match(['PUT','PATCH','GET'],'product/show/{id}','ProductController@show')->name('product.show');
Route::get('product/{id}/restore','ProductController@restore')->name('product.restore');
Route::delete('product/{id}','ProductController@destroy')->name('product.destroy');
Route::delete('/product/{id}/delete', 'ProductController@deletePermanent')->name('product.delete-permanent');
Route::get('BarangTidakDijual','ProductController@trash')->name('product.trash');
Route::get('selectall','ProductController@selectAll')->name('product.selectAll');
Route::get('selectallre','ProductController@selectAllre')->name('product.selectAll.re');
Route::resource('check', 'CheckoutController');
Route::get('ulasan/{id}','CheckoutController@form')->name('form.ulasan');
Route::match(['post','put', 'patch'],'product/{id}/ulas', 'CheckoutController@ulas')->name('ulasan');
Route::resource('cart','CartController');
Route::get('keranjang/{id}','CheckoutController@form')->name('keranjang');
Route::patch('carts/update', 'CartController@store')->name('carts.store');
Route::delete('carts/remove', 'CartController@remove')->name('carts.remove');
Route::resource('user','UserController');
Route::post('review','ProductController@review')->name('give-review');