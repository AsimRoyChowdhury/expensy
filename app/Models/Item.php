<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name', 'item_group_id'
    ];

    public function item_group(){
        return $this->belongsTo(ItemGroup::class);
    }

    public function expenditures(){
        return $this->hasMany(Expenditure::class);
    }
}
