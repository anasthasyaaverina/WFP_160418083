<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }
}
