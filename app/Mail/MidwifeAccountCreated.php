<?php

namespace App\Mail;

use App\Midwife;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MidwifeAccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $password, $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Midwife $midwife, $password)
    {
        $this->user = $midwife;
        $this->password = $password;
        $this->url = route('midwife.login');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('no-reply@maccs.com')
            ->subject('Account Created!')
            ->markdown('emails.accounts.midwife.created');
    }
}
