<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalManagement extends Model
{
    protected $fillable = [
      'name',
      'phone',
      'email',
      'amount',
      'date',
      'detail',
    ];
}
