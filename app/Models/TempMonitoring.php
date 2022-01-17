<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempMonitoring extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function coldstorage()
    {
        return $this->belongsTo(ColdStorage::class,'cold_storage_id');
    }
}
