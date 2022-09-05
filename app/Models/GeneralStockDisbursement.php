<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralStockDisbursement extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function general_stock_disbursement_item(){
        return $this->hasMany(GeneralStockDisbursementItem::class);
    }
}
