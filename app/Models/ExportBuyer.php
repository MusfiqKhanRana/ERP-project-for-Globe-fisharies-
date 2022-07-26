<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportBuyer extends Model
{
    use HasFactory;

    public function getBankDetailsAttribute($value){
        return  unserialize($value);
      }
}
