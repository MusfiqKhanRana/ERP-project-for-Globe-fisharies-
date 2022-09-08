<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionExportInventory extends Model
{
    use HasFactory;
    public function export_pack_size(){
        return $this->belongsTo(ExportPackSize::class);
    }
}
