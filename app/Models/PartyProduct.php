<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyProduct extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function party()
    {
        return $this->belongsToMany(Party::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function supply_item()
    {
        return $this->belongsTo(SupplyItem::class);
    }
}