<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorcycle extends Model
{
    /** @use HasFactory<\Database\Factories\MotorcycleFactory> */
    use HasFactory;
    use SoftDeletes;

    public function loans()
    {
        return $this->hasMany(Loan::class, 'motorcycles_id');
    }

    protected $fillable = [
        "brand",
        "type",
        "licencePlate",
        "year",
        "gearbox",
        "fuel",
        "powerLe",
        "powerkW",
        "engineSize",
        "drivingLicence",
        "places",
        "price",
        "deposit",
        "trafficDate",
        "location",
        "image",
        "isInService",
        "problamComment"
    ];
}
