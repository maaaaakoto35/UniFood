<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'store';

    protected $fillable = ['title', 'content', 'file_name', 'store'];
}
