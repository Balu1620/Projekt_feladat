<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceSwitch extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceSwitchFactory> */
    use HasFactory;

    protected $table = 'device_switches';

    protected $fillable = ['tools_id', 'loans_id'];

    public function motorRental()
    {
        return $this->belongsTo(MotorRental::class, 'loans_id');
    }
   
    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tools_id');
    }
}
