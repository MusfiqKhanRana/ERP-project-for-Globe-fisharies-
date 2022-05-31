<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use  App\Models\Designation;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'image',
        'name',
        'f_name',
        'b_date',
        'gender',
        'phone',
        'local_add',
        'per_add',
        'email',
        'password',
        'employee_id',
        'dept_id',
        'deg_id',
        'date',
        //'salary',
        'ac_name',
        'ac_num',
        'bank_name',
        'code',
        //'pan_num',
        //'branch',
        'resume',
        'offer_letter',
        'join_letter',
        'con_letter',
        'proof'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function payment()
    {
        return $this->belongsTo(Payment::class)->withDefault();
    }

    public function office_loan()
    {
        return $this->belongsTo(OfficeLoan::class)->withDefault();
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function increments()
    {
        return $this->hasMany(Increment::class);
    }
    public function loans()
    {
        return $this->hasMany(OfficeLoan::class);
    }
    public function loan_installments()
    {
        return $this->hasMany(OfficeLoanInstallment::class);
    }
    public function bonus()
    {
        return $this->hasMany(Bonus::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class,'deg_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'dept_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
