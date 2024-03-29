<?php

namespace App\Mail\front;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactPage extends Mailable
{
    use Queueable, SerializesModels;

    protected $_data = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('front.emails.contactPage',['data' => $this->_data]);
    }
}
