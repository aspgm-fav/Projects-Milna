<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable=[
        'title'
    ];
    public function product(){
        return $this->belongsToMany('App\Product','product_categories');
    }
    
}
