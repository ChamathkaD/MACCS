<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Midwife extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'midwives';

    protected $guard = 'midwife';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'nic',
        'address',
        'cases',
        'image',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * Get the midwife's full name.
     *
     * @return string
     */
    public function getFullNameAttribute() {

        if (isset($this->first_name) || isset($this->last_name)) {
            return "{$this->first_name} {$this->last_name}";
        }

    }

    /**
     * Get the users for the midwives.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'midwife_id');
    }

    /**
     * Get all of the midwife's appointments.
     */
    public function appointments()
    {
        return $this->morphMany(Appointment::class, 'appointmentable');
    }

}
