<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionProcessingGrade extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function production_processing_unit()
    {
        return $this->belongsTo(ProductionProcessingUnit::class);
    }
}
