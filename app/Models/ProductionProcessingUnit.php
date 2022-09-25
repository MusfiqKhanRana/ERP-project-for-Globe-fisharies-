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
    public function production_processing_grades()
    {
        return $this->hasMany(ProductionProcessingGrade::class, 'production_processing_unit_id','id');
    }
    public function production_processing_block_grades()
    {
        return $this->hasMany(ProductionProcessingBlockGrade::class, 'production_processing_unit_id','id');
    }
}
