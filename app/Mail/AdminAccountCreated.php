<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminAccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $admin, $password, $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin, $password)
    {
        $this->admin = $admin;
        $this->password = $password;
        $this->url = route('admin.login');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.accounts.admin.created');
    }
}
