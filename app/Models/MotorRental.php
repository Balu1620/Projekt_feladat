<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorRental extends Model
{
    use HasFactory;

    
    protected $table = 'loans';

    protected $fillable = [
        'motorcycles_id',  'rentalDate', 'returnDate',  'users_id'
    ];

    
    public $timestamps = true;

    public function deviceSwitches()
    {
        return $this->hasMany(DeviceSwitch::class, 'loans_id'); // kapcsolódás a DeviceSwitch táblához
    }

    // A motor adatainak kapcsolása
    public function motor()
    {
        return $this->belongsTo(Motorcycle::class, 'motor_id');
    }
}
