<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionPurchaseRequisition extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function items()
    {
        return $this->belongsToMany(ProductionPurchaseItem::class, 'production_purchase_requisition_items','production_purchase_requisition_id','item_id')->withPivot('item_id','item_name','item_type_id','item_type_name','item_unit_id','item_unit_name','demand_date','image','quantity','specification','remark');
    }
}
