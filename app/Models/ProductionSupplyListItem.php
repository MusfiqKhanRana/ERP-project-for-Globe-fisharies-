<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionSupplyListItem extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function grade()
    {
        return $this->belongsTo(FishGrade::class,'grade_id')->withDefault();
    }
    public function production_supply_items()
    {
        return $this->belongsToMany(SupplyItem::class,"production_supply_items","production_supply_list_id","item_id")
        ->withPivot('quantity','expected_date','status');
    }
    
}
