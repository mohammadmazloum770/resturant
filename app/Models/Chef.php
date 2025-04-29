<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Chef extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];
}