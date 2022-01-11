<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function area()
    {
        return $this->belongsTo(Area::class, 'id', 'name')->withDefault();
    }
    public function customer()
    {
        return $this->belongsTo(Cutomer::class)->withDefault();
    }
    public function product()
    {
        return $this->belongsTo(ProductOrder::class)->withDefault();
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class)->withDefault();
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_orders','order_id','product_id')->withPivot('id','quantity','discount_in_amount','discount_in_percentage','selling_price','status','SinglecancelMassage');
    }
    
}
