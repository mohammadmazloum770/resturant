<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkLog extends Model
{
    protected $fillable = ['user_id', 'user_type', 'date', 'start_time', 'end_time'];
}