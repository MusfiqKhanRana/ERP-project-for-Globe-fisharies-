<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'product_name',
      'product_id',
      'unit',
      'buying_price',
      'selling_price',
      'online_selling_price',
      'inhouse_selling_price',
      'retail_selling_price',
      'category_id',
      'pack_id',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
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
}
