<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class party_product extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function party()
    {
        return $this->belongsToMany(Party::class);
    }
}


