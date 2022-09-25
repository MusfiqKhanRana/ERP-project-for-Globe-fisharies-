<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionProcessingBlockGrade extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function production_processing_unit()
    {
        return $this->belongsTo(ProductionProcessingUnit::class);
    }
    public function production_processing_grades()
    {
        return $this->hasMany(ProductionProcessingGrade::class,'grade_block_id','id');
    }
}
