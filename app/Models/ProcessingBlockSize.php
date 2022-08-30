<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessingBlockSize extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function processing_fish_grade()
    {
        return $this->belongsTo(ProcessingBlockSize::class,'fish_grade');
    }
}
