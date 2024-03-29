<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionSupplyList extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function supply_lists()
    {
        return $this->belongsTo(ProductionSupplyList::class,'id');
    }
    public function production_supply_list_items()
    {
        return $this->hasMany(ProductionSupplyListItem::class,"production_supply_list_id");
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
