<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpanceTransaction extends Model
{
    protected $fillable = [
        'bank_id', 'amount', 'note', 'status'
    ];

    public function bank()
    {
        return $this->hasOne(BankAccount::class,'id', 'bank_id')->withDefault();
    }
}
