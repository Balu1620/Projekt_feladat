<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;

    protected $fillable = [
        'rentalDate',
        'returnDate',
        'comment',
        'motorcycles_id',
        'users_id', 
        'gaveDown',
        "problemDescription"
    ];

    
    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class, 'motorcycles_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function deviceSwitches()
    {
        return $this->hasMany(DeviceSwitch::class, 'loans_id');
    }
}
