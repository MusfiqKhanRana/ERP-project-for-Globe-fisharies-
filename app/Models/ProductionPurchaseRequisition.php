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
        return $this->belongsToMany(ProductionPurchaseItem::class, 'production_purchase_requisition_items','production_purchase_requisition_id','item_id')->withPivot('id','item_id','item_name','item_type_id','item_type_name','item_unit_id','item_unit_name','demand_date','image','quantity','specification','remark','status');
    }
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
     public function production_requisition_item()
    {
        return $this->belongsTo(ProductionPurchaseRequisitionItem::class,'item_id','status');
    }
}
