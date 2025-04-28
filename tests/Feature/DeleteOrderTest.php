<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Loan;
use App\Models\Tool;
use App\Models\DeviceSwitch;

class DeleteOrderTest extends TestCase
{
    /** @test */
    public function it_deletes_an_existing_order()
    {
        // Lekérjük az 1-es ID-jú rendelést az adatbázisból
        $order = Loan::find(1);

        // Ellenőrizzük, hogy a rendelés létezik az adatbázisban
        $this->assertNotNull($order, 'Az 1-es ID-jú rendelés nem található az adatbázisban.');

        // Ellenőrizzük, hogy vannak hozzá kapcsolódó eszközkapcsolatok
        $deviceSwitches = $order->deviceSwitches;
        foreach ($deviceSwitches as $deviceSwitch) {
            $this->assertDatabaseHas('device_switches', ['id' => $deviceSwitch->id]);
        }

        // Hívjuk meg a törlési metódust
        $response = $this->delete(route('deleteOrder', ['ordersId' => $order->orders_id]));

        // Ellenőrizzük, hogy a rendelés törlődött az adatbázisból
        $this->assertDatabaseMissing('loans', ['id' => $order->id]);

        // Ellenőrizzük, hogy a kapcsolódó eszközkapcsolatok is törlődtek
        foreach ($deviceSwitches as $deviceSwitch) {
            $this->assertDatabaseMissing('device_switches', ['id' => $deviceSwitch->id]);
        }

        // Ellenőrizzük a helyes átirányítást és sikerüzenetet
        $response->assertRedirect(route('userProfile'));
        $response->assertSessionHas('success', 'A rendelés sikeresen törölve!');
    }

}