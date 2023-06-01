<?php

namespace App\Mail\back;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $_user = '';
    protected $_code = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$code)
    {
        $this->_code = $code;
        $this->_user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('back.emails.forgotPasswordEmail',['user' => $this->_user, 'code' => $this->_code]);
    }
}
