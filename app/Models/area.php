<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    
    // use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }
}
