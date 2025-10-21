<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use softDeletes;

    protected $fillable=[
        'title', 'price', 'stock', 'weight', 'condition', 'description','status'
    ];
    

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsToMany('App\Category','product_categories');
    }
    public function image(){
        return $this->belongsToMany('App\Image','product_images');
    }
    public function review(){
        return $this->belongsToMany('App\Review','product_reviews');
    }
    public function checkout(){
        return $this->belongsToMany('App\Checkout','product_checkouts');
    }
    public function qty(){
        return $this->belongsToMany('App\Cart','checkouts')
        ->withPivot('product_id')->sum('quantity');
    }
}
