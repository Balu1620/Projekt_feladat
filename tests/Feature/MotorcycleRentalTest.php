<?php

namespace Tests\Feature;

use App\Models\Loan;
use App\Models\Motorcycle;
use Date;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\MotorRental;
use App\Models\DeviceSwitch;
use App\Models\Tool;
use Illuminate\Support\Str;

class MotorcycleRentalTest extends TestCase
{
    public function testLoanAndDeviceSwitchCreation()
    {
        $userId = 1;
        $motorcycles_id = 2;
        $created_at	= new Date();
        $updated_at	= new Date();

        $loan = Loan::create([
            'users_id' => $userId,
            'rentalDate' => '2025-01-01',
            'returnDate' => '2025-01-05',
            'gaveDown' => 0,
            'orders_id' => 'ORD-ETMX9F9U',
            'motorcycles_id' => $motorcycles_id,
            'created_at' => $created_at,
            'updated_at' => $updated_at
            
        ]);

        $deviceSwitch = DeviceSwitch::create([
            'loans_id' => $loan->id,
            'tools_id' => 1, 
        ]);

        $this->assertDatabaseHas('loans', [
            'id' => $loan->id,
            'users_id' => $userId,
        ]);

        $this->assertDatabaseHas('device_switches', [
            'loans_id' => $loan->id,
            'tools_id' => 1,
        ]);
    }

}

