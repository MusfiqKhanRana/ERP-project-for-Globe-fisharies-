<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeLoan extends Model
{
    protected $fillable = [
      'employee_id',
      'amount',
      'date',
      'detail',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id')->withDefault();
    }
}
