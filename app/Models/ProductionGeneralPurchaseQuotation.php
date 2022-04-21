<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionGeneralPurchaseQuotation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function supplier()
    {
        return $this->belongsTo(ProductionSupplier::class);
    }
    public function supplier_list()
    {
        return $this->hasMany(ProductionPurchaseRequisitionItem::class,'supplier_id','status');
    }
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
    
    
}
