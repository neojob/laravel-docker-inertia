<?php

namespace App\Mail\back;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAdminWelcome extends Mailable
{
    use Queueable, SerializesModels;

    protected $_user = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {

        $this->_user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('back.emails.newAdminWelcome',['user' => $this->_user]);
    }
}
