<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the parent's full name.
     *
     * @return string
     */
    public function getFullNameAttribute() {

        if (isset($this->first_name) || isset($this->last_name)) {
            return "{$this->first_name} {$this->last_name}";
        }

    }

    /**
     * Get the children for the parent.
     */
    public function children()
    {
        return $this->hasMany(Child::class, 'user_id');
    }

    /**
     * Get the midwife that owns the User.
     */
    public function midwife()
    {
        return $this->belongsTo(Midwife::class);
    }

    /**
     * Get all of the parent's appointments.
     */
    public function appointments()
    {
        return $this->morphMany(Appointment::class, 'appointmentable');
    }

}
