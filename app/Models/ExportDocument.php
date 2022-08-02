<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'document',
        'sales_contract_id',
    ];
}
