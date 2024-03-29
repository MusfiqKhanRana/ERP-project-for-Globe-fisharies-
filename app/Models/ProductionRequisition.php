<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionRequisition extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function production_supplier()
    {
        return $this->belongsTo(ProductionSupplier::class,'production_supplier_id');
    }
    public function production_requisition_items()
    {
        return $this->belongsToMany(SupplyItem::class,'production_requisition_items','production_requisition_id','supply_item_id')
        ->withPivot('id','production_requisition_id','rate','alive_quantity','dead_quantity','received_remark','quantity');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function getDateAttribute($value){
        return  \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
    
    public function production_processing_unit()
    {
        return $this->hasMany(ProductionProcessingUnit::class,'requisition_id');
    }
}
