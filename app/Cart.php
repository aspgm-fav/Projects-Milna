<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['status','totalprice','name_receiver','phone','status',
    'address','sub_district','city','province','zip_code'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function checkout(){
        return $this->hasMany('App\Checkout');
    }
}
