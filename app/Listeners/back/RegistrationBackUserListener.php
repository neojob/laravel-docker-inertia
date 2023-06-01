<?php

namespace App\Listeners\back;

use App\Events\OnRegistrationBackUserEvent;
use App\Jobs\back\RegistrationBackUserJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegistrationBackUserListener
{
    protected $superAdminEmail;
    protected $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($superAdminEmail, $user)
    {
        $this->superAdminEmail = $superAdminEmail;
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  onActivationBackUserEvent  $event
     * @return void
     */
    public function handle(OnRegistrationBackUserEvent $event)
    {
        //Queue
        dispatch(new RegistrationBackUserJob($this->superAdminEmail,$this->user));

    }
}
