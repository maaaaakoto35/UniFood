<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'menus';

    protected $fillable = ['ip_adress'];
}
