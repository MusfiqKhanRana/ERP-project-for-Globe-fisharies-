<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionSupplier extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function supplier_items()
    {
        return $this->belongsToMany(SupplyItem::class,'production_supplier_items','production_supplier_id','supply_item_id')->withPivot('production_supplier_id','supply_item_id', 'grade_id','rate');
    }
}

