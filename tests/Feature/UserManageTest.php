<?php

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Tests\TestCase;

class UserManageTest extends TestCase
{

    public function test_update_method_updates_existing_user_with_id_2()
    {
        // 2-es ID-val rendelkező felhasználó lekérése az adatbázisból
        $user = User::find(2);

        // Ha a felhasználó nem létezik, hibát dobunk
        if (!$user) {
            $this->fail('A felhasználó nem található az adatbázisban.');
        }

        // Hitelesítés
        $this->actingAs($user);

        // Storage mockolása
        Storage::fake('public');

        // Kérések adatai (csak a frissíteni kívánt mezők)
        $requestData = [
            'name' => 'Új Név',
            'email' => 'uj@example.com',
            'phoneNumber' => '222222222',
        ];

        // Feltöltendő fájlok mockolása
        $fileData = [
            'drivingLicenceImage' => UploadedFile::fake()->image('uj_elol.jpg'),
            'drivingLicenceImageBack' => UploadedFile::fake()->image('uj_hatul.jpg'),
        ];

        // Request objektum létrehozása
        $request = Request::create('/dummy', 'POST', array_merge($requestData, $fileData));

        // Controller meghívása
        $controller = new UserController();
        $response = $controller->update($request);

        // Adatok frissítése után ellenőrzés
        $user->refresh();

        // Ellenőrizzük, hogy a frissített adatok megfelelőek
        $this->assertEquals('Új Név', $user->name);
        $this->assertEquals('uj@example.com', $user->email);
        $this->assertEquals('222222222', $user->phoneNumber);

    }

}
