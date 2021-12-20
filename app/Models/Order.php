<?php

namespace App\Models;

use App\Models\Area;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function area()
    {
        return $this->belongsTo(Area::class, 'id', 'name')->withDefault();
    }
    public function customer()
    {
        return $this->belongsTo(Cutomer::class)->withDefault();
    }
    public function product()
    {
        return $this->belongsTo(ProductOrder::class)->withDefault();
    }
    
}
