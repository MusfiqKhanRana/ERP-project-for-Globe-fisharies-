<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTher extends Model
{
    use HasFactory;
    protected $fillable = [
        'date', 'load_time', 'unload_time', 'freezer_no', 'info_temp','remark',
    ];
}
