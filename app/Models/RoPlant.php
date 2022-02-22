<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoPlant extends Model
{
    protected $guarded = [];
    use HasFactory;
    // public function reports()
    // {
    //     return $this->belongsTo(RoPlantReport::class, 'ro_plants_id','id');
    // }
    public function reports()
    {
        return $this->hasMany(RoPlantReport::class, 'ro_plants_id', 'id');
    }
}
