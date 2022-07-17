<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvidentFundUser extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function provident_fund()
    {
        return $this->belongsTo(ProvidentFund::class);
    }
    public function getAppliedMonthAttribute($value){
        return  \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
    public function getInstallmentsAttribute($value){
        return  unserialize($value);
    }
    
}
