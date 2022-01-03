<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cutomer extends Model
{
    protected $fillable = [
        'full_name',
        'designation',
        'phone',
        'email',
        'customer_type',
        'activated',
        'address',
        'area_id',
        'include_word'
    ];

    public function customer_balance()
    {
        return $this->belongsTo(CustomerBalance::class)->withDefault();
    }
    public function area()
    {
        return $this->belongsTo(Area::class)->withDefault();
    }
    public function sale_point()
    {
        return $this->belongsTo(SalePoint::class)->withDefault();
    }
}
