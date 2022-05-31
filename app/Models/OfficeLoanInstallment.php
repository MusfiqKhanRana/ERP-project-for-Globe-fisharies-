<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeLoanInstallment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function office_loan()
    {
        return $this->belongsTo(OfficeLoan::class);
    }
}
