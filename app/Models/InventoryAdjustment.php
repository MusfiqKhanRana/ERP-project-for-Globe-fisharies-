<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryAdjustment extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function SupplyItem()
    {
        return $this->hasOne(SupplyItem::class,'id', 'supply_item_id');
    }
    public function Grade()
    {
        return $this->hasOne(ProcessingGrade::class,'id', 'processing_grade_id');
    }
    public function Block()
    {
        return $this->hasOne(ProcessingBlock::class,'id', 'processing_block_id');
    }
    public function Block_size()
    {
        return $this->hasOne(ProcessingBlockSize::class,'id', 'processing_block_size_id');
    }
    public function MC_size()
    {
        return $this->hasOne(ExportPackSize::class,'id', 'export_pack_size_id');
    }
}

