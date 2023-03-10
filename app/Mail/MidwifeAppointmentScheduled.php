<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MidwifeAppointmentScheduled extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $time;
    public $venue;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date, $time, $venue)
    {
        $this->date = $date;
        $this->time = $time;
        $this->venue = $venue;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.appointments.scheduled');
    }
}
