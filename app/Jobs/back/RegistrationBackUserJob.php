<?php

namespace App\Jobs\back;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\back\NewAdminWelcome;
use App\Mail\back\NewUserRegistrationForAdmin;
use Mail;




class RegistrationBackUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $superAdminEmail;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($superAdminEmail, $user)
    {
        $this->user = $user;
        $this->superAdminEmail = $superAdminEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new NewAdminWelcome($this->user));
        Mail::to($this->superAdminEmail)->send(new NewUserRegistrationForAdmin($this->user));

    }
}
