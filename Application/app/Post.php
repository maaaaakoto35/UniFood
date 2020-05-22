<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\String_;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['name', 'title', 'store_name', 'store_jname', 'contents', 'rate', 'img_name', 'img_path'];
}
