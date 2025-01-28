<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'password', 'is_email_verified', 'image', 'role', 'is_active', 'created_at', 'updated_at'];
}
