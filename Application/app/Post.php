<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\String_;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'store_name', 'store_jname', 'contents', 'rate'];
}
