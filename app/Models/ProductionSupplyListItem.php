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
        return $this->belongsTo(SupplyItem::class,"item_id");
    }
    
}
