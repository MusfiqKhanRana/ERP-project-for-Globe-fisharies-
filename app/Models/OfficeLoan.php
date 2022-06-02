<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeLoan extends Model
{
    // protected $fillable = [
    //   'User_id',
    //   'amount',
    //   'date',
    //   'detail',
    // ];
    protected $guarded = [];
    public function employee()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function getInstalmentDatesAttribute($value){
      return  unserialize($value);
    }
    public function loan_instalment()
    {
        return $this->hasMany(OfficeLoanInstallment::class,'office_loan_id');
    }
}
