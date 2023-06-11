<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'group'
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function expenditures(){
        return $this->hasMany(Expenditure::class);
    }
}
