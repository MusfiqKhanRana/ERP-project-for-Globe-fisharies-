<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesContractItem extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function supply_item()
    {
        return $this->belongsTo(SupplyItem::class,'supply_item_id');
    }
    public function fish_grade()
    {
        return $this->belongsTo(FishGrade::class,'fish_grade_id');
    }
    public function export_pack_size()
    {
        return $this->belongsTo(ExportPackSize::class,'export_pack_size_id');
    }
    public function processing_fish_size()
    {
        return $this->belongsTo(ProcessingBlockSize::class,'block_size_id');
    }
}
