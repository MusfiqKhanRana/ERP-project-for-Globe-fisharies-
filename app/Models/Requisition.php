<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class)->withDefault();
    }
    public function party()
    {
        return $this->belongsTo(Party::class)->withDefault();
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'requisition_product','requisition_id','product_id')->withPivot('id','quantity', 'packet','final_quantity');
    }
}
