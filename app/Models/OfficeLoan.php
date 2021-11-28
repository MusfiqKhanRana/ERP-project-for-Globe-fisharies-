<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeLoan extends Model
{
    protected $fillable = [
      'User_id',
      'amount',
      'date',
      'detail',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'User_id', 'User_id')->withDefault();
    }
}
