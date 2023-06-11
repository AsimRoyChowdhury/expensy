<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'item_id', 'Quantity', 'cost'
    ];

    public function guestinfo(){
        return $this->belongsTo(Guestinfo::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
