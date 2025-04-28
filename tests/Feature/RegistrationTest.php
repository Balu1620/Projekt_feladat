<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\User;

class RegistrationTest extends TestCase
{

    public function testCreate_UserWithValidData_SavesToDatabase()
    {
        // Fájl feltöltésének szimulálása
        Storage::fake('public');
        $fileFront = UploadedFile::fake()->image('driving_licence_front.jpg');
        $fileBack = UploadedFile::fake()->image('driving_licence_back.jpg');

        // Tesztadatok
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123',
            'phoneNumber' => '123456789',
            'drivingLicenceNumber' => 'ABC123456',
            'drivingLicenceType' => 'B',
            'drivingLicenceImage' => $fileFront,
            'drivingLicenceImageBack' => $fileBack,
        ];

        // A függvény meghívása
        $user = $this->create($data);

        // Ellenőrzések
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phoneNumber' => '123456789',
            'drivingLicenceNumber' => 'ABC123456',
            'drivingLicenceType' => 'B',
        ]);

        // Ellenőrizzük, hogy a fájlok ténylegesen el lettek-e mentve
        Storage::disk('public')->assertExists('driving_licence_images/' . $fileFront->hashName());
        Storage::disk('public')->assertExists('driving_licence_images/' . $fileBack->hashName());

        // Ellenőrizzük, hogy a jelszó hash-elve lett-e
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    protected function create(array $data)
    {
        // A regisztrációs függvényed másolata teszteléshez
        if (isset($data['drivingLicenceImage']) && isset($data['drivingLicenceImageBack'])) {
            $filePath = $data['drivingLicenceImage']->store('driving_licence_images', 'public');
            $filePathBack = $data['drivingLicenceImageBack']->store('driving_licence_images', 'public');
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phoneNumber' => $data['phoneNumber'],
            'drivingLicenceNumber' => $data['drivingLicenceNumber'],
            'drivingLicenceType' => $data['drivingLicenceType'],
            'drivingLicenceImage' => isset($filePath) ? $filePath : null,
            'drivingLicenceImageBack' => isset($filePathBack) ? $filePathBack : null,
        ]);
    }
}
