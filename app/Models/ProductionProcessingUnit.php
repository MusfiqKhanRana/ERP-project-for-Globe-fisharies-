<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionProcessingUnit extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function production_processing_item()
    {
        return $this->belongsTo(SupplyItem::class,'item_id');
    }
}
