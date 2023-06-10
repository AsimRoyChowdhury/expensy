<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admininfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'username', 'admin_id', 'password' 
    ];
}
