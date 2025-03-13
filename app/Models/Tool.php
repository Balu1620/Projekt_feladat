<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    /** @use HasFactory<\Database\Factories\ToolFactory> */
    use HasFactory;

    protected $table = 'tools';

    // Az eszközhöz tartozó kapcsolatok
    public function deviceSwitches()
    {
        return $this->hasMany(DeviceSwitch::class, 'tools_id');
    }
}
