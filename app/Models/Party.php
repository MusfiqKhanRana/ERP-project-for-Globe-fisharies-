<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function product_parties()
    {
        return $this->belongsToMany(Product::class, 'party_products','party_id','product_id')->withPivot('id','price');
    }
    
}

