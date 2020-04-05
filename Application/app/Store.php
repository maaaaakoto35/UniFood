<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';

    protected $fillable = ['store_name', 'foods', 'place', 'rate'];

    // public function scopeStore($query, $store_name){
    //     $query->where('store_name', $store_name);
    // }
}
?>