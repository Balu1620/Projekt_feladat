<?php

namespace App\Models;

use App\Notifications\CustomEmailVerificationNotification;
use App\Notifications\CustomPasswordResetNotification;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phoneNumber',
        'drivingLicenceNumber',
        'drivingLicenceType',
        'drivingLicenceImage',
        'drivingLicenceImageBack',
        'drivingLicenceReal'
    ];

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getDrivingLicenceImagePathAttribute()
    {
        return $this->drivingLicenceImage
            ? asset('storage/' . $this->drivingLicenceImage)
            : null;
    }

    public function loans()
    {
        return $this->hasMany(Loan::class, 'user_id');
    }

    public $notificationType = 'password_reset';
    public $actionText = 'Jelszó visszaállítása';

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Jelszó visszaállítása')
            ->view('emails.custom-notification', [
                'actionUrl' => $url,
                'actionText' => $this->actionText,
                'notificationType' => $this->notificationType,
            ]);
    }
}
