<?php

namespace Tests\Feature;

use App\Http\Controllers\ToolController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Loan;
use App\Models\Tool;
use App\Models\DeviceSwitch;

class DeleteToolFromOrderTest extends TestCase
{
    /** @test */
    public function deletes_a_tool()
    {   
        $order = Loan::find(2); 
        $tool = Tool::find(1);  

        $deviceSwitch = DeviceSwitch::where('tools_id', $tool->id)
            ->where('loans_id', $order->id)
            ->first();

        $this->assertNotNull($deviceSwitch, 'A megadott eszközhöz nem tartozik kapcsolódó device_switch a rendelésben.');

        $deviceSwitch->delete();
    }


}