<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Jobs\front\SendMessageJob;
use App\Mail\front\ContactPage;

class RabbitMQController extends Controller
{
    public function index()
    {
        dispatch(new SendMessageJob('some@mail.com', 'Hello From RabbitMQ!', 'Test Text'));
        return response('Message sent to RabbitMQ');
    }
}
