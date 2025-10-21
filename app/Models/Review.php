<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=['rating','desc'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function product(){
        return $this->belongsToMany('App\Product','product_reviews');
    }
}
