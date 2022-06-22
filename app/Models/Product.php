<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'supply_item_id',
      'product_id',
      'variant',
      'buying_price',
      'selling_price',
      'online_selling_price',
      'inhouse_selling_price',
      'processing_name',
      'pack_id',
      'safety_stock',
      'image'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function supplyitem()
    {
        return $this->hasOne(SupplyItem::class,'id', 'supply_item_id');
    }

    public function stock()
    {
        return $this->hasMany(StockProduct::class);
    }
    public function sale_point()
    {
        return $this->belongsTo(SalePoint::class)->withDefault();
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class)->withDefault();
    }
    public function pack()
    {
        return $this->belongsTo(Pack::class)->withDefault();
    }
    public function order()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }
    public function parties()
    {
        return $this->belongsToMany(Party::class, 'party_product');
    }
}
