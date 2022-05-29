<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Increment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['amount'];
    public function getAmountAttribute()
    {
        if ($this->type=="Decrement") {
            return -abs($this->increment_amount);
        }else{
            return $this->increment_amount;
        }
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
