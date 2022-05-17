<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function supplyitem()
    {
        return $this->hasOne(SupplyItem::class,'id', 'name');
    }
}
