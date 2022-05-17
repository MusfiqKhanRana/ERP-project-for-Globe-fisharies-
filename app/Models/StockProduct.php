<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    protected $fillable = ['product_id', 'quantity', 'warehouse_id','requisition_id','buying_price'];

    public function warehouse()
    {
        return $this->hasOne(Warehouse::class,'id', 'warehouse_id')->withDefault();
    }
    public function product()
    {
        return $this->hasOne(Product::class,'id', 'product_id')->withDefault();
    }
    public function supplyitem()
    {
        return $this->hasOne(SupplyItem::class,'id', 'name');
    }
}
