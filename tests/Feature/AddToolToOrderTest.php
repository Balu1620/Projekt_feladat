<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Loan;
use App\Models\Tool;
use App\Models\DeviceSwitch;

class AddToolToOrderTest extends TestCase
{

    /** @test */
    public function it_adds_multiple_tools_to_an_existing_order()
    {
        // Használjuk a meglévő rendelést
        $order = Loan::find(1);

        // Ellenőrizzük, hogy a rendelés létezik
        $this->assertNotNull($order, 'Az id=1 rendelés nem található az adatbázisban.');

        // Hozzunk létre 3 különböző típusú eszközt
        $tools = [
            Tool::find(1), // sisak
            Tool::find(6), // protektoros ruha
            Tool::find(11), // cipő
        ];

        foreach ($tools as $tool) {
            // Ellenőrizzük, hogy az eszköz létezik
            $this->assertNotNull($tool, "Az id={$tool->id} eszköz nem található az adatbázisban.");

            // Make the request to add the tool
            $response = $this->post(route('addToolToOrder', ['ordersId' => $order->orders_id]), [
                'tool_id' => $tool->id,
            ]);

            // Assert the tool was added
            $this->assertDatabaseHas('device_switches', [
                'tools_id' => $tool->id,
                'loans_id' => $order->id,
            ]);

            // Assert the redirection and success message
            $response->assertRedirect();
            $response->assertSessionHas('success', 'Új eszköz hozzáadva a rendeléshez.');
        }
    }

}
