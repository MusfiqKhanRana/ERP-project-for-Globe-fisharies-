<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfectMoney extends Model
{
    protected $table = "perfect_moneys";
    protected $fillable = ['display_name','passpharase','usd','status','prefect_money_picture'];
}
