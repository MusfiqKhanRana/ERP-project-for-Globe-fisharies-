<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MedicalReport extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function getDateAttribute($value){
        return  \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
}
