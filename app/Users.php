<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['name', 'email', 'phone', 'cel', 'gender', 'dob','password'];
    protected $dates = ['deleted_at'];
}
