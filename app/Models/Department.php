<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function designation()
    {
        return $this->hasMany(Designation::class, 'dept_id', 'id');
    }
    public function employee()
    {
        return $this->hasMany(User::class, 'id','dept_id');
    }
}
