<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiffinBill extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'employee_id');
    }
    public function getDateAttribute($value){
        return  \Carbon\Carbon::parse($value)->format('M-Y');
    }
}
