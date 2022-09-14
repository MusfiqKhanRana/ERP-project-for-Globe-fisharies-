<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionPurchaseItem extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function productionpurchasetype()
    {
        return $this->belongsTo(ProductionPurchaseType::class,'procution_purchase_type_id');
    }
    public function productionpurchaseunit()
    {
        return $this->belongsTo(ProductionPurchaseUnit::class,'production_purchase_unit_id');
    }
    public function requisitions()
    {
        return $this->hasMany(ProductionPurchaseRequisitionItem::class, 'item_id','id');
    }
    public function disbursement_item()
    {
        return $this->hasMany(GeneralStockDisbursementItem::class, 'item_id','id');
    }
}
