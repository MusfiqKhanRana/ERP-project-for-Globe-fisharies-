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
        return $this->belongsTo(ProductionPurchaseRequisition::class);
    }
    public function items()
    {
        return $this->belongsTo(ProductionPurchaseItem::class,'item_id');
    }
    public function production_general_purchase_quotation()
    {
        return $this->hasMany(ProductionGeneralPurchaseQuotation::class,'production_purchase_requisition_item_id');
    }
    public function supplier()
    {
        return $this->belongsTo(ProductionSupplier::class,'supplier_info');
    }
    public function production_purchase_requisitions()
    {
        return $this->belongsTo(ProductionPurchaseRequisition::class);
    }
   
    
    
}
