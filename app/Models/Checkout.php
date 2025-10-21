<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
        protected $fillable = [
            'checkout_id', 'product_id','quantity','price','give_rating'
        ];
        public function product(){
            return $this->belongsTo('App\Product');
        }
        public function cart(){
            return $this->belongsTo('App\Cart');
        }
}
