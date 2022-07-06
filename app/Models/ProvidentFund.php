<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvidentFund extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->hasMany(User::class,'provident_fund');
    }
    public function provident_fund_users()
    {
        return $this->hasMany(ProvidentFundUser::class);
    }
}
