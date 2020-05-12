<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menus';

    protected $fillable = ['food_name', 'store_name', 'store_jname', 'price', 'food_img'];
}
