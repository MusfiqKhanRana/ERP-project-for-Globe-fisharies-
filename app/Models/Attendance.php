<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = [
        'date',
        'employee_email',
        'user_id',
        'status',
        'ip',
        'device',
        'shift'
    ];
    public function employee()
    {
        return $this->belongsTo(User::class,'user_id');
    }
   
}
