<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionPurchaseRequisitionItem extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function production_purchase_requisition()
    {
        return $this->belongsTo(ProductionPurchaseRequisition::class,'production_purchase_requisition_id');
    }
    public function items()
    {
        return $this->belongsTo(ProductionPurchaseItem::class,'item_id');
    }
}