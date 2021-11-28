<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'user_id',
        'attend',
        'salary',
        'from_date',
        'to_date'
    ];
    public function employee()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
