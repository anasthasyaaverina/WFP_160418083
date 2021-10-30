<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'product_transaction', 'transaction_id', 'product_id')
                    ->withPivot(
                        'quantity', 
                        'harga_produk');
    }
}
