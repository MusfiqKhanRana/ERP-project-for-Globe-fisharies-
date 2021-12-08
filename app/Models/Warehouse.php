<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'location'];

    public function stock_product()
    {
        return $this->belongsTo(StockProduct::class)->withDefault();
    }
    public function sale_point()
    {
        return $this->belongsTo(SalePoint::class)->withDefault();
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'stock_products', 'warehouse_id', 'product_id')->withPivot('id','quantity');
    }
}
