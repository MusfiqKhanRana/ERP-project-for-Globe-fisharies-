<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionSupplierItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function grade()
    {
        return $this->belongsTo(FishGrade::class,'grade_id')->withDefault();
    }
}
