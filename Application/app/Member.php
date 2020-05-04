<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = ['name', 'e_mail', 'student_number', 'password', 'img_name', 'img_path'];
}