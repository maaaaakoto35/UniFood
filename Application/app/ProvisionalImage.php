<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvisionalImage extends Model
{
    protected $table = 'provisional_images';

    protected $fillable = ['id', 'name', 'path'];
}
