<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'drivingLicenceNumber' => ['required', 'string', 'size:8', 'max:255'],
            'drivingLicenceType' => ['required', 'string', 'max:255'],
            'drivingLicenceImage' => ['required', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'drivingLicenceImageBack' => ['required', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //Ellenőrizzük, hogy van-e feltöltött fájl
        if (isset($data['drivingLicenceImage']) && isset($data['drivingLicenceImageBack'])) {
            //A fájl feltöltése és a fájl elérési útjának mentése
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
