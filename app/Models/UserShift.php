<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShift extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->hasMany(User::class,'user_shift_id');
    }
}
