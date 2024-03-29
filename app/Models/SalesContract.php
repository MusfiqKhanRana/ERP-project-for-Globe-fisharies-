<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesContract extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function sales_contract_items()
    {
        return $this->hasMany(SalesContractItem::class);
    }
    public function fish_grade()
    {
        return $this->belongsTo(FishGrade::class,'fish_grade_id');
    }
    public function processing_fish_size()
    {
        return $this->belongsTo(ProcessingBlockSize::class,'block_size_id');
    }
    public function export_buyer()
    {
        return $this->belongsTo(ExportBuyer::class);
    }
    public function advising_bank()
    {
        return $this->belongsTo(BankAccount::class,'advising_bank_id');
    }
    public function documents()
    {
        return $this->hasMany(ExportDocument::class);
    }
    public function getDateAttribute($value){
        return  \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
}
