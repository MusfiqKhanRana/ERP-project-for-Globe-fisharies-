<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cutomer extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'address',
        'include_word'
    ];

    public function customer_balance()
    {
        return $this->belongsTo(CustomerBalance::class)->withDefault();
    }

    public function sale_point()
    {
        return $this->belongsTo(SalePoint::class)->withDefault();
    }
}
