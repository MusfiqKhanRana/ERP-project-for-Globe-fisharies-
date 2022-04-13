<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected  $table = "designations";
    protected $fillable = [
        'deg_name', 'dept_id'
    ];

    public function food_meal()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }
    public function employee()
    {
        return $this->hasMany(User::class,'deg_id');
    }
}
